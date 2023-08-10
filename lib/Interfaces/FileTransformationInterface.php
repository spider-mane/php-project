<?php

namespace WebTheory\Prefill\Interfaces;

interface FileTransformationInterface
{
    public function transform(string $file, string $contents, array $values): string;
}
