<?php

namespace YukataRm\Laravel\Resource\Commands\Extractors\Interfaces;

/**
 * Extractor Interface
 *
 * @package YukataRm\Laravel\Resource\Commands\Extractors\Interfaces
 */
interface ExtractorInterface
{
    /**
     * set file name
     *
     * @param string $name
     * @return static
     */
    public function setName(string $name): static;

    /**
     * extract file content
     *
     * @return string
     */
    public function extract(): string;
}
