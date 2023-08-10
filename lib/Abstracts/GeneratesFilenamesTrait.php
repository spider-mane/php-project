<?php

namespace WebTheory\Prefill\Abstracts;

trait GeneratesFilenamesTrait
{
    protected function cleanpath(string ...$paths): string
    {
        $ds = DIRECTORY_SEPARATOR;
        $path = str_replace('./', '', implode($ds, $paths));
        $pattern = ['~/+~', '~\\+~', "~{$ds}+~"];

        return preg_replace($pattern, $ds, $path);
    }
}
