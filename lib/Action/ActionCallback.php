<?php

namespace WebTheory\Prefill\Action;

use WebTheory\Prefill\Interfaces\BuildActionInterface;

class ActionCallback implements BuildActionInterface
{
    /**
     * @var callable
     */
    protected $callback;

    /**
     * @param callable(string $root, string $values): void $callback
     */
    public function __construct(callable $callback)
    {
        $this->callback = $callback;
    }

    public function act(string $root, array $values): void
    {
        ($this->callback)($root, $values);
    }
}
