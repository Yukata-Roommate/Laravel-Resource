<?php

namespace YukataRm\Laravel\Resource\Commands\Modifiers;

use YukataRm\Laravel\Resource\Commands\Modifiers\Base\ResourceModifier;

use Illuminate\Support\Str;

/**
 * Request Modifier
 *
 * @package YukataRm\Laravel\Resource\Commands\Modifiers
 */
class RequestModifier extends ResourceModifier
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
            "RequestEntityClassName",
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
            $this->requestNamespace(),
            $this->comment("Request"),
            $this->nameUpper(),
            $this->requestEntityClass($this->nameUpper()),
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
        return Str::plural(implode("_", array_map(
            fn($directory) => strtolower($directory),
            $this->directory
        )));
    }
}
