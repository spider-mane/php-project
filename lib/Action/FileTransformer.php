<?php

namespace WebTheory\Prefill\Action;

use WebTheory\Prefill\Abstracts\GeneratesFilenamesTrait;
use WebTheory\Prefill\Interfaces\BaseResolverInterface;
use WebTheory\Prefill\Interfaces\BuildActionInterface;
use WebTheory\Prefill\Interfaces\FileTransformationInterface;

class FileTransformer implements BuildActionInterface
{
    use GeneratesFilenamesTrait;

    /**
     * @var array<FileTransformationInterface>
     */
    protected array $modifiers;

    /**
     * @param list<string> $files
     * @param array<string,callable> $filters
     */
    public function __construct(
        protected array $files,
        protected array $filters,
        protected BaseResolverInterface $baseResolver,
        FileTransformationInterface ...$modifiers
    ) {
        $this->modifiers = $modifiers;
    }

    public function act(string $root, array $values): void
    {
        foreach ($this->files as $file) {
            $base = $this->resolveBase($file);
            $filtered = $this->maybeFilterValues($base, $values);

            $contents = file_get_contents($file);

            foreach ($this->modifiers as $mod) {
                $contents = $mod->transform($base, $contents, $filtered);
            }

            file_put_contents($this->cleanpath($root, $base), $contents);
        }
    }

    protected function resolveBase(string $file): string
    {
        return $this->baseResolver->getBaseFrom($file);
    }

    protected function maybeFilterValues(string $file, array $values): array
    {
        return ($filter = $this->filters[$file] ?? false)
            ? $filter($values)
            : $values;
    }
}
