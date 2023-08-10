<?php

namespace WebTheory\Prefill\Transformation;

use ReflectionFunction;
use ReflectionParameter;
use WebTheory\Prefill\Abstracts\GeneratesFilenamesTrait;
use WebTheory\Prefill\Interfaces\FileTransformationInterface;

class JsonMerger implements FileTransformationInterface
{
    use GeneratesFilenamesTrait;

    public function __construct(
        protected string $root,
        protected array $mergers
    ) {
        //
    }

    public function transform(string $file, string $contents, array $values): string
    {
        return ($merger = $this->fetchMerger($file))
            ? $this->merge($merger, $this->getBaseContents($file), $contents)
            : $contents;
    }

    protected function fetchMerger(string $base): callable|false
    {
        return $this->mergers[$base] ?? false;
    }

    protected function merge(callable $merger, string $base, string $stub): string
    {
        $params = $this->getMergerParams($merger);
        $callback = $this->getMergerArgResolver();

        return $this->encodeAndFormatJson(
            $merger(...array_map($callback, [$base, $stub], $params))
        );
    }

    protected function getMergerParams(callable $merger): array
    {
        return (new ReflectionFunction($merger))->getParameters();
    }

    protected function getMergerArgResolver(): callable
    {
        return fn (string $json, ReflectionParameter $param): array|object => $this->decodeJson(
            $json,
            'array' === $param->getType()->getName()
        );
    }

    protected function encodeAndFormatJson(array $data): string
    {
        return $this->formatJson($this->encodeJson($data));
    }

    protected function formatJson(string $json): string
    {
        $default = '    ';
        $preferred = '  ';

        return str_replace($default, $preferred, $json) . "\n";
    }

    protected function encodeJson(array $data): string
    {
        $flags = JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES;

        return json_encode($data, $flags);
    }

    protected function decodeJson(string $json, bool $associative): array|object
    {
        return json_decode($json, $associative);
    }

    protected function getBaseContents(string $file): string
    {
        return file_get_contents($this->cleanpath($this->root, $file));
    }
}
