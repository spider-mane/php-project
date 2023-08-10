<?php

namespace WebTheory\Prefill;

use WebTheory\Prefill\Interfaces\BuildActionInterface;
use WebTheory\Prefill\Interfaces\ValueProviderInterface;

class Builder
{
    /**
     * @var array<BuildActionInterface>
     */
    protected array $actions = [];

    public function __construct(BuildActionInterface ...$actions)
    {
        $this->actions = $actions;
    }

    public function build(string $root, ValueProviderInterface $provider): void
    {
        $values = $provider->getValues();

        foreach ($this->actions as $action) {
            $action->act($root, $values);
        }
    }
}
