<?php

namespace WebTheory\Prefill\Abstracts;

trait GivesCommandsTrait
{
    protected function runCommand(string $command): string|false|null
    {
        return shell_exec($command);
    }

    protected function runSuccessiveCommands(string ...$commands): string|false|null
    {
        return $this->runCommand(implode(' && ', $commands));
    }
}
