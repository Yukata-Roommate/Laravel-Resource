<?php

namespace YukataRm\Laravel\Resource\Commands\Creators;

use YukataRm\Laravel\Resource\Commands\Creators\Base\EntityResourceCreator;

/**
 * Request Entity Creator
 *
 * @package YukataRm\Laravel\Resource\Commands\Creators
 */
class RequestEntityCreator extends EntityResourceCreator
{
    /**
     * base file directory
     *
     * @return string
     */
    protected function baseDirectory(): string
    {
        return app_path("Http" . DIRECTORY_SEPARATOR . "Requests");
    }

    /**
     * base file name
     *
     * @var string
     */
    protected string $baseName = "Entity";
}
