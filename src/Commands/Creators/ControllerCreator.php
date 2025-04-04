<?php

namespace YukataRm\Laravel\Resource\Commands\Creators;

use YukataRm\Laravel\Resource\Commands\Creators\Base\ResourceCreator;

/**
 * Controller Creator
 *
 * @package YukataRm\Laravel\Resource\Commands\Creators
 */
class ControllerCreator extends ResourceCreator
{
    /**
     * base file directory
     *
     * @return string
     */
    protected function baseDirectory(): string
    {
        return app_path("Http" . DIRECTORY_SEPARATOR . "Controllers");
    }

    /**
     * base file name
     *
     * @var string
     */
    protected string $baseName = "Controller";
}
