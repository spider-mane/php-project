<?php

namespace WebTheory\Prefill\Action;

use FilesystemIterator;
use WebTheory\Prefill\Abstracts\GeneratesFilenamesTrait;
use WebTheory\Prefill\Interfaces\BuildActionInterface;

class DirectoryKeeper implements BuildActionInterface
{
    use GeneratesFilenamesTrait;

    protected const EXTRA_KEY = 'keep_directories';

    protected const KEEPER_FILE = '.gitkeep';

    /**
     * @var list<string>
     */
    protected array $paths;

    public function __construct(string ...$paths)
    {
        $this->paths = $paths;
    }

    public function act(string $root, array $values): void
    {
        $extra = $values[static::EXTRA_KEY] ?? [];

        foreach ([...$this->paths, ...$extra] as $path) {
            $path = $this->cleanpath($root, $path);

            if ($this->isNonOrEmptyDirectory($path)) {
                $this->keepDirectory($path);
            }
        }
    }

    protected function isNonOrEmptyDirectory(string $path): bool
    {
        return !file_exists($path) || !(new FilesystemIterator($path))->valid();
    }

    protected function keepDirectory(string $path): void
    {
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        touch($this->cleanpath($path, static::KEEPER_FILE));
    }
}
