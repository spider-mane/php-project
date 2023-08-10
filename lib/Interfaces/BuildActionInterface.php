<?php

namespace WebTheory\Prefill\Interfaces;

interface BuildActionInterface
{
    public function act(string $root, array $values): void;
}
