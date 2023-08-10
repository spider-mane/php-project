<?php

namespace WebTheory\Prefill;

use Exception;
use RuntimeException;
use WebTheory\Prefill\Interfaces\BaseResolverInterface;

class BaseResolver implements BaseResolverInterface
{
    /**
     * @var list<string>
     */
    protected array $paths;

    /**
     * @var array<string,string>
     */
    protected array $reroutes;

    /**
     * @param array<string,string> $reroutes
     */
    public function __construct(array $reroutes, string ...$paths)
    {
        rsort($paths);

        $this->paths = $paths;
        $this->reroutes = $reroutes;
    }

    public function getBaseFrom(string $file): string
    {
        return $this->rebase($this->extract($file, $this->findPath($file)));
    }

    protected function findPath(string $file): string
    {
        foreach ($this->paths as $path) {
            if (str_starts_with($file, $path)) {
                return $path;
            }
        }

        throw $this->baseNotFoundException($file);
    }

    protected function extract(string $file, string $path): string
    {
        return trim(substr_replace($file, '', 0, strlen($path)), '/\\');
    }

    protected function rebase(string $base): string
    {
        return ($reroute = $this->reroutes[$base] ?? false)
            ? $reroute . '/' . $base
            : $base;
    }

    protected function baseNotFoundException(string $file): Exception
    {
        return new RuntimeException(
            "Could not resolve base for file \"{$file}\". No path to file was provided."
        );
    }
}
