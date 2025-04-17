<?php

namespace YukataRm\Laravel\Resource\Commands\Modifiers;

use YukataRm\Laravel\Resource\Commands\Modifiers\Base\ResourceModifier;

/**
 * Request Entity Modifier
 *
 * @package YukataRm\Laravel\Resource\Commands\Modifiers
 */
class RequestEntityModifier extends ResourceModifier
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
            $this->requestEntityNamespace(),
            $this->comment("Request Entity"),
            $this->nameUpper(),
        ];
    }
}
