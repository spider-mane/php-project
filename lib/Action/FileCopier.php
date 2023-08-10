<?php

namespace WebTheory\Prefill\Action;

use WebTheory\Prefill\Abstracts\GivesCommandsTrait;
use WebTheory\Prefill\Interfaces\BuildActionInterface;

class FileCopier implements BuildActionInterface
{
    use GivesCommandsTrait;

    protected const EXTRA_KEY = 'copy_files';

    /**
     * @var list<string>
     */
    protected array $files;

    public function __construct(string ...$files)
    {
        $this->files = $files;
    }

    public function act(string $root, array $values): void
    {
        $extra = $values[static::EXTRA_KEY] ?? [];

        foreach ([...$this->files, ...$extra] as $file) {
            $this->runCommand("cp -R {$file} {$root}");
        }
    }
}
