<?php

namespace YukataRm\Laravel\Resource\Commands\Creators\Interfaces;

/**
 * Creator Interface
 *
 * @package YukataRm\Laravel\Resource\Commands\Creators\Interfaces
 */
interface CreatorInterface
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
     * set force create
     *
     * @param bool $force
     * @return static
     */
    public function setForce(bool $force): static;

    /**
     * create resource
     *
     * @param string $content
     * @return string
     */
    public function create(string $content): string;
}
