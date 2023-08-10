<?php

namespace WebTheory\Prefill\Transformation;

use WebTheory\Prefill\Interfaces\FileTransformationInterface;

class TransformationCallback implements FileTransformationInterface
{
    /**
     * @var callable
     */
    protected $callback;

    /**
     * @param callable(string $file, string $contents, array $values): string $callback
     */
    public function __construct(callable $callback)
    {
        $this->callback = $callback;
    }

    public function transform(string $file, string $contents, array $values): string
    {
        return ($this->callback)($file, $contents, $values);
    }
}
