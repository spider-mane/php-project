<?php

namespace WebTheory\Prefill\Action;

use WebTheory\Prefill\Abstracts\GeneratesFilenamesTrait;
use WebTheory\Prefill\Interfaces\BuildActionInterface;
use WebTheory\Prefill\Interfaces\TextReplacementsInterface;

class FilenameChanger implements BuildActionInterface
{
    use GeneratesFilenamesTrait;

    public function __construct(protected TextReplacementsInterface $renames)
    {
        //
    }

    public function act(string $root, array $values): void
    {
        foreach ($this->renames as $file) {
            $old = $this->cleanpath($root, $file);
            $new = $this->cleanpath(
                $root,
                dirname($file),
                $this->renames->replace($file, $values)
            );

            rename($old, $new);
        }
    }
}
