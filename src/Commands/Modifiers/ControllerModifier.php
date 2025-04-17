<?php

namespace YukataRm\Laravel\Resource\Commands\Modifiers;

use YukataRm\Laravel\Resource\Commands\Modifiers\Base\ResourceModifier;

/**
 * Controller Modifier
 *
 * @package YukataRm\Laravel\Resource\Commands\Modifiers
 */
class ControllerModifier extends ResourceModifier
{
    /**
     * get search
     *
     * @return array<string>
     */
    protected function search(): array
    {
        return [
            "NameSpace",
            "Comment",
            "NameUpper",
            "Name",
            "ServiceNamespace",
            "RequestNamespace",
        ];
    }

    /**
     * get replace
     *
     * @return array<string|int>
     */
    protected function replace(): array
    {
        return [
            $this->controllerNamespace(),
            $this->comment("Controller"),
            $this->nameUpper(),
            $this->name,
            $this->serviceNamespace([$this->nameUpper()]),
            $this->requestNamespace([$this->nameUpper()]),
        ];
    }
}
