<?php

namespace YukataRm\Laravel\Resource\Commands\Modifiers;

use YukataRm\Laravel\Resource\Commands\Modifiers\Base\ResourceModifier;

use YukataRm\Text\Proxies\Text;

use Illuminate\Support\Str;

/**
 * View Modifier
 *
 * @package YukataRm\Laravel\Resource\Commands\Modifiers
 */
class ViewModifier extends ResourceModifier
{
    /**
     * get search
     *
     * @return array<string>
     */
    protected function search(): array
    {
        return [
            "Name",
            "VariableName",
            "VariablesName",
            "ModalName",
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
            implode(".", $directory),
            end($directory),
            Str::plural(end($directory)),
            implode("", array_map(fn($value) => Text::toPascal($value), $directory)),
        ];
    }
}
