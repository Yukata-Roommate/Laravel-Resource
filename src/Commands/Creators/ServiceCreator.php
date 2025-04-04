<?php

namespace YukataRm\Laravel\Resource\Commands\Creators;

use YukataRm\Laravel\Resource\Commands\Creators\Base\ResourceCreator;

/**
 * Service Creator
 *
 * @package YukataRm\Laravel\Resource\Commands\Creators
 */
class ServiceCreator extends ResourceCreator
{
    /**
     * base file directory
     *
     * @return string
     */
    protected function baseDirectory(): string
    {
        return app_path("Services");
    }

    /**
     * base file name
     *
     * @var string
     */
    protected string $baseName = "Service";
}
