<?php

namespace YukataRm\Laravel\Resource\Commands\Modifiers\Interfaces;

/**
 * Modifier Interface
 *
 * @package YukataRm\Laravel\Resource\Commands\Modifiers\Interfaces
 */
interface ModifierInterface
{
    /**
     * set file directory
     *
     * @param array<string> $directory
     * @return static
     */
    public function setDirectory(array $directory): static;

    /**
     * set file name
     *
     * @param string $name
     * @return static
     */
    public function setName(string $name): static;

    /**
     * modify file content
     *
     * @param string $content
     * @return string
     */
    public function modify(string $content): string;
}
