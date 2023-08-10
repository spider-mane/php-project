<?php

namespace WebTheory\Prefill\Action;

use WebTheory\Prefill\Abstracts\GivesCommandsTrait;
use WebTheory\Prefill\Interfaces\BuildActionInterface;

class GitInitiator implements BuildActionInterface
{
    use GivesCommandsTrait;

    public function act(string $root, array $values): void
    {
        $this->runSuccessiveCommands(
            "rm -rf {$root}/.git",
            "git init {$root}"
        );
    }
}
