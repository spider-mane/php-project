<?php

namespace WebTheory\Prefill\Transformation;

use WebTheory\Prefill\Interfaces\FileTransformationInterface;
use WebTheory\Prefill\Interfaces\TextReplacementsInterface;

class TextReplacer implements FileTransformationInterface
{
    public function __construct(protected TextReplacementsInterface $replacements)
    {
        $this->replacements = $replacements;
    }

    public function transform(string $file, string $contents, array $values): string
    {
        foreach ($this->replacements as $text) {
            $contents = $this->updateContent($text, $contents, $values);
        }

        return $contents;
    }

    protected function updateContent(string $text, string $content, array $values): string
    {
        return str_replace(
            $text,
            $this->replacements->replace($text, $values),
            $content
        );
    }
}
