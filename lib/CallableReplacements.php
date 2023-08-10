<?php

namespace WebTheory\Prefill;

use ArrayIterator;
use IteratorAggregate;
use Traversable;
use WebTheory\Prefill\Interfaces\TextReplacementsInterface;

class CallableReplacements implements TextReplacementsInterface, IteratorAggregate
{
    /**
     * @var array<string,string|callable>
     */
    protected array $replacements;

    public function __construct(array $replacements)
    {
        $this->replacements = $replacements;
    }

    public function replace(string $text, array $values): string
    {
        return is_callable($replacement = $this->getReplacement($text))
            ? $replacement($values)
            : $values[$replacement];
    }

    public function getIterator(): Traversable
    {
        return new ArrayIterator(array_keys($this->replacements));
    }

    protected function getReplacement(string $replacement): string|callable
    {
        return $this->replacements[$replacement];
    }
}
