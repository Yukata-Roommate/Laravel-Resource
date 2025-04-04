<?php

namespace YukataRm\Laravel\Resource\Commands\Creators;

use YukataRm\Laravel\Resource\Commands\Creators\Base\ResourceCreator;

/**
 * View Creator
 *
 * @package YukataRm\Laravel\Resource\Commands\Creators
 */
class ViewCreator extends ResourceCreator
{
    /**
     * base file directory
     *
     * @return string
     */
    protected function baseDirectory(): string
    {
        return resource_path("views/pages");
    }

    /**
     * base file name
     *
     * @var string
     */
    protected string $baseName = ".blade";
}
