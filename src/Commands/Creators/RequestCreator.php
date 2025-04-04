<?php

namespace YukataRm\Laravel\Resource\Commands\Creators;

use YukataRm\Laravel\Resource\Commands\Creators\Base\ResourceCreator;

/**
 * Request Creator
 *
 * @package YukataRm\Laravel\Resource\Commands\Creators
 */
class RequestCreator extends ResourceCreator
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
    protected string $baseName = "Request";
}
