<?php

namespace YukataRm\Laravel\Resource\Commands\Modifiers;

use YukataRm\Laravel\Resource\Commands\Modifiers\Base\ResourceModifier;

use Illuminate\Support\Str;

/**
 * Model Modifier
 *
 * @package YukataRm\Laravel\Resource\Commands\Modifiers
 */
class ModelModifier extends ResourceModifier
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
            "RepositoryEntityClassName",
            "TableName",
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
            $this->modelNamespace(),
            $this->comment("Model"),
            $this->nameUpper(),
            $this->repositoryEntityClass($this->nameUpper()),
            $this->tableName(),
        ];
    }

    /*----------------------------------------*
     * Table Name
     *----------------------------------------*/

    /**
     * get table name
     *
     * @return string
     */
    protected function tableName(): string
    {
        return implode("_", array_map(
            fn($directory) => strtolower($directory),
            array_merge($this->directory, [Str::plural($this->name)])
        ));
    }
}
