<?php

namespace YukataRm\Laravel\Resource\Commands\Creators;

use YukataRm\Laravel\Resource\Commands\Creators\Base\ResourceCreator;

/**
 * Repository Creator
 *
 * @package YukataRm\Laravel\Resource\Commands\Creators
 */
class RepositoryCreator extends ResourceCreator
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
    protected string $baseName = "Repository";
}
