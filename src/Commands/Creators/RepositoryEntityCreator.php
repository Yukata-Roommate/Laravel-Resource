<?php

namespace YukataRm\Laravel\Resource\Commands\Creators;

use YukataRm\Laravel\Resource\Commands\Creators\Base\EntityResourceCreator;

/**
 * Repository Entity Creator
 *
 * @package YukataRm\Laravel\Resource\Commands\Creators
 */
class RepositoryEntityCreator extends EntityResourceCreator
{
    /**
     * base file directory
     *
     * @return string
     */
    protected function baseDirectory(): string
    {
        return app_path("Repositories");
    }

    /**
     * base file name
     *
     * @var string
     */
    protected string $baseName = "Entity";
}
