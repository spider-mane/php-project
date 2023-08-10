<?php

namespace WebTheory\Prefill\Action;

use WebTheory\Prefill\Abstracts\GivesCommandsTrait;
use WebTheory\Prefill\Interfaces\BuildActionInterface;

class AutoloadDumper implements BuildActionInterface
{
    use GivesCommandsTrait;

    public function act(string $root, array $values): void
    {
        $this->runCommand("composer dump-autoload -d {$root}");
    }
}
