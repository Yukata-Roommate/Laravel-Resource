<?php

namespace YukataRm\Laravel\Resource\Commands\Modifiers;

use YukataRm\Laravel\Resource\Commands\Modifiers\Base\ResourceModifier;

/**
 * Repository Modifier
 *
 * @package YukataRm\Laravel\Resource\Commands\Modifiers
 */
class RepositoryModifier extends ResourceModifier
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
            "ModelClassName",
            "RepositoryEntityClassName",
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
            $this->repositoryNamespace(),
            $this->comment("Repository"),
            $this->nameUpper(),
            $this->modelClass($this->nameUpper()),
            $this->repositoryEntityClass($this->nameUpper()),
        ];
    }
}
