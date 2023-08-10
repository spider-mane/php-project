<?php

namespace WebTheory\Prefill\Action;

use WebTheory\Prefill\Abstracts\GeneratesFilenamesTrait;
use WebTheory\Prefill\Abstracts\GivesCommandsTrait;
use WebTheory\Prefill\Interfaces\BuildActionInterface;

class FileRemover implements BuildActionInterface
{
    use GeneratesFilenamesTrait;
    use GivesCommandsTrait;

    protected array $files;

    public function __construct(string ...$files)
    {
        $this->files = $files;
    }

    public function act(string $root, array $values): void
    {
        foreach ($this->files as $file) {
            $path = $this->cleanpath($root, $file);

            $this->runCommand("rm -rf {$path}");
        }
    }
}
