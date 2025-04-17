<?php

namespace YukataRm\Laravel\Resource\Service;

use YukataRm\Laravel\Resource\Service\BaseService;

use Illuminate\View\View;

/**
 * Create Service
 *
 * @package YukataRm\Laravel\Resource\Service
 */
abstract class CreateService extends BaseService
{
    /**
     * get view
     *
     * @param array $data
     * @return \Illuminate\View\View
     */
    protected function view(array $data = []): View
    {
        return view($this->viewPath(), $data);
    }

    /**
     * get view path
     *
     * @return string
     */
    protected function viewPath(): string
    {
        return $this->resourceView("create");
    }
}
