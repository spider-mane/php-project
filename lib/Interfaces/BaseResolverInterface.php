<?php

namespace WebTheory\Prefill\Interfaces;

interface BaseResolverInterface
{
    public function getBaseFrom(string $file): string;
}
