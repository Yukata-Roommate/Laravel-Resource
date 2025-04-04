<?php

namespace YukataRm\Laravel\Resource\Commands\Conductors\Interfaces;

/**
 * Conductor Interface
 *
 * @package YukataRm\Laravel\Resource\Commands\Conductors\Interfaces
 */
interface ConductorInterface
{
    /**
     * set command arguments
     *
     * @param string $target
     * @param array<string> $directory
     * @param bool $force
     * @return static
     */
    public function setCommandArguments(string $target, array $directory, bool $force): static;

    /**
     * conduct create resource
     *
     * @return string
     */
    public function conduct(): string;
}
