<?php

namespace WebTheory\Prefill\Interfaces;

use Traversable;

interface TextReplacementsInterface extends Traversable
{
    public function replace(string $text, array $values): string;
}
