<?php

namespace WebTheory\Prefill\Action;

use WebTheory\Prefill\Interfaces\BuildActionInterface;

class Message implements BuildActionInterface
{
    public function __construct(protected string $message)
    {
        //
    }

    public function act(string $root, array $values): void
    {
        echo $this->message;
    }
}
