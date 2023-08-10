<?php

namespace WebTheory\Prefill;

use WebTheory\Prefill\Interfaces\ValueProviderInterface;

class Prompt implements ValueProviderInterface
{
    protected const COL_DESCRIPTION = 0;
    protected const COL_HELP = 1;
    protected const COL_DEFAULT = 2;

    public function __construct(
        protected array $fields,
        protected string $consent
    ) {
        //
    }

    public function getValues(): array
    {
        $modify = 'n';
        do {
            if ($modify == 'q') {
                exit;
            }

            $values = [];

            echo "----------------------------------------------------------------------\n";
            echo "Please provide the following information:\n";
            echo "----------------------------------------------------------------------\n";
            foreach ($this->fields as $key => $field) {
                $default = isset($field[static::COL_DEFAULT])
                    ? $this->interpolate($field[static::COL_DEFAULT], $values)
                    : '';

                $prompt = sprintf(
                    '%s%s%s: ',
                    $field[static::COL_DESCRIPTION],
                    $field[static::COL_HELP] ? ' (' . $field[static::COL_HELP] . ')' : '',
                    $field[static::COL_DEFAULT] !== '' ? ' [' . $default . ']' : ''
                );
                $values[$key] = $this->readFromConsole($prompt);
                if (empty($values[$key])) {
                    $values[$key] = $default;
                }
            }
            echo "\n";

            echo "----------------------------------------------------------------------\n";
            echo "Please check that everything is correct:\n";
            echo "----------------------------------------------------------------------\n";
            foreach ($this->fields as $key => $field) {
                echo $field[static::COL_DESCRIPTION] . ": $values[$key]\n";
            }
            echo "\n";
        } while (($modify = strtolower($this->readFromConsole($this->consent . ' [y/N/q] '))) != 'y');

        echo "\n";

        return $values;
    }

    protected function readFromConsole($prompt): string
    {
        if (function_exists('readline')) {
            $line = trim(readline($prompt));
            if (!empty($line)) {
                readline_add_history($line);
            }
        } else {
            echo $prompt;
            $line = trim(fgets(STDIN));
        }

        return $line;
    }

    protected function interpolate($text, $values)
    {
        if (!preg_match_all('/\{(\w+)\}/', $text, $m)) {
            return $text;
        }
        foreach ($m[0] as $k => $str) {
            $f = $m[1][$k];
            $text = str_replace($str, $values[$f], $text);
        }

        return $text;
    }
}
