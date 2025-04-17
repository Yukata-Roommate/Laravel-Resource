<?php

namespace YukataRm\Laravel\Resource\Commands\Modifiers;

use YukataRm\Laravel\Resource\Commands\Modifiers\Base\ResourceModifier;

use YukataRm\Text\Proxies\Text;

/**
 * Service Modifier
 *
 * @package YukataRm\Laravel\Resource\Commands\Modifiers
 */
class ServiceModifier extends ResourceModifier
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
            "RequestEntityClassName",
            "RepositoryFacadeMethod",
            "VariableName",
            "ModelClassName",
        ];
    }

    /**
     * get replace
     *
     * @return array<string|int>
     */
    protected function replace(): array
    {
        $directory = array_map(fn($directory) => Text::toCamel($directory), $this->directory);

        return [
            $this->serviceNamespace(),
            $this->comment("Service"),
            $this->nameUpper(),
            implode(".", $directory),
            $this->requestEntityClass($this->nameUpper()),
            implode("()->", $directory),
            end($directory),
            $this->modelClass(),
        ];
    }
}
