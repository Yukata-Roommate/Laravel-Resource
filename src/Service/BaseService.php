<?php

namespace YukataRm\Laravel\Resource\Service;

use YukataRm\Laravel\Service\RedirectService;

/**
 * Base Service
 *
 * @package YukataRm\Laravel\Resource\Service
 */
abstract class BaseService extends RedirectService
{
    /*----------------------------------------*
     * Resource
     *----------------------------------------*/

    /**
     * name
     *
     * @var string
     */
    protected string $name;

    /**
     * get route path
     *
     * @param string $resource
     * @return string
     */
    protected function resourceRoute(string $resource): string
    {
        return "{$this->name}.{$resource}";
    }

    /**
     * get view path
     *
     * @param string $resource
     * @return string
     */
    protected function resourceView(string $resource): string
    {
        return "pages.{$this->name}.{$resource}";
    }
}
