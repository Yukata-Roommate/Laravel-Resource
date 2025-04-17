<?php

namespace YukataRm\Laravel\Resource\Commands\Modifiers\Base;

use YukataRm\Laravel\Resource\Commands\Modifiers\Interfaces\ModifierInterface;

use YukataRm\Text\Proxies\Text;

/**
 * Resource Modifier
 *
 * @package YukataRm\Laravel\Resource\Commands\Modifiers\Base
 */
abstract class ResourceModifier implements ModifierInterface
{
    /**
     * get search
     *
     * @return array<string>
     */
    abstract protected function search(): array;

    /**
     * get replace
     *
     * @return array<string|int>
     */
    abstract protected function replace(): array;

    /*----------------------------------------*
     * Properties
     *----------------------------------------*/

    /**
     * file directory
     *
     * @var array<string>
     */
    protected array $directory = [];

    /**
     * file name
     *
     * @var string
     */
    protected string $name = "";

    /**
     * set file directory
     *
     * @param array<string> $directory
     * @return static
     */
    public function setDirectory(array $directory): static
    {
        $this->directory = $directory;

        return $this;
    }

    /**
     * set file name
     *
     * @param string $name
     * @return static
     */
    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * get name upper case
     *
     * @return string
     */
    protected function nameUpper(): string
    {
        return Text::toPascal($this->name);
    }

    /*----------------------------------------*
     * Modify
     *----------------------------------------*/

    /**
     * modify file content
     *
     * @param string $content
     * @return string
     */
    public function modify(string $content): string
    {
        return $this->modifyContent($content);
    }

    /**
     * modify stub file content
     *
     * @param string $content
     * @return string
     */
    protected function modifyContent(string $content): string
    {
        $search = $this->search();

        foreach ($search as $key => $value) {
            $search[$key] = "{{ {$value} }}";
        }

        return str_replace($search, $this->replace(), $content);
    }

    /*----------------------------------------*
     * Namespace
     *----------------------------------------*/

    /**
     * get namespace
     *
     * @param string $default
     * @param array<string> $directory
     * @return string
     */
    protected function getNamespace(string $default, array $directory): string
    {
        $directory = array_merge($this->directory, $directory);

        if (empty($directory)) return $default;

        $directoryString = implode("\\", array_map(fn($item) => Text::toPascal($item), $directory));

        return "{$default}\\{$directoryString}";
    }

    /**
     * get controller namespace
     *
     * @param array<string> $directory
     * @return string
     */
    public function controllerNamespace(array $directory = []): string
    {
        return $this->getNamespace("App\\Http\\Controllers", $directory);
    }

    /**
     * get request namespace
     *
     * @param array<string> $directory
     * @return string
     */
    public function requestNamespace(array $directory = []): string
    {
        return $this->getNamespace("App\\Http\\Requests", $directory);
    }

    /**
     * get request entity namespace
     *
     * @param array<string> $directory
     * @return string
     */
    public function requestEntityNamespace(array $directory = []): string
    {
        return $this->requestNamespace($directory) . "\\Entities";
    }

    /**
     * get model namespace
     *
     * @param array<string> $directory
     * @return string
     */
    public function modelNamespace(array $directory = []): string
    {
        return $this->getNamespace("App\\Models", $directory);
    }

    /**
     * get repository namespace
     *
     * @param array<string> $directory
     * @return string
     */
    public function repositoryNamespace(array $directory = []): string
    {
        return $this->getNamespace("App\\Repositories", $directory);
    }

    /**
     * get repository entity namespace
     *
     * @param array<string> $directory
     * @return string
     */
    public function repositoryEntityNamespace(array $directory = []): string
    {
        return $this->repositoryNamespace($directory) . "\\Entities";
    }

    /**
     * get service namespace
     *
     * @param array<string> $directory
     * @return string
     */
    public function serviceNamespace(array $directory = []): string
    {
        return $this->getNamespace("App\\Services", $directory);
    }

    /*----------------------------------------*
     * Class Name
     *----------------------------------------*/

    /**
     * get class name
     *
     * @param string $namespace
     * @param string $default
     * @param string|null $name
     * @return string
     */
    protected function getClassName(string $namespace, string $default, string|null $name = null): string
    {
        return is_null($name)
            ? "{$namespace}{$default}"
            : "{$namespace}\\{$name}{$default}";
    }

    /**
     * get controller class name
     *
     * @param string|null $name
     * @param array<string> $directory
     * @return string
     */
    public function controllerClass(string|null $name = null, array $directory = []): string
    {
        return $this->getClassName(
            $this->controllerNamespace($directory),
            "Controller",
            $name
        );
    }

    /**
     * get request class name
     *
     * @param string|null $name
     * @param array<string> $directory
     * @return string
     */
    public function requestClass(string|null $name = null, array $directory = []): string
    {
        return $this->getClassName(
            $this->requestNamespace($directory),
            "Request",
            $name
        );
    }

    /**
     * get request entity class name
     *
     * @param string|null $name
     * @param array<string> $directory
     * @return string
     */
    public function requestEntityClass(string|null $name = null, array $directory = []): string
    {
        return $this->getClassName(
            $this->requestEntityNamespace($directory),
            "Entity",
            $name
        );
    }

    /**
     * get model class name
     *
     * @param string|null $name
     * @param array<string> $directory
     * @return string
     */
    public function modelClass(string|null $name = null, array $directory = []): string
    {
        return $this->getClassName(
            $this->modelNamespace($directory),
            "",
            $name
        );
    }

    /**
     * get repository class name
     *
     * @param string|null $name
     * @param array<string> $directory
     * @return string
     */
    public function repositoryClass(string|null $name = null, array $directory = []): string
    {
        return $this->getClassName(
            $this->repositoryNamespace($directory),
            "Repository",
            $name
        );
    }

    /**
     * get repository entity class name
     *
     * @param string|null $name
     * @param array<string> $directory
     * @return string
     */
    public function repositoryEntityClass(string|null $name = null, array $directory = []): string
    {
        return $this->getClassName(
            $this->repositoryEntityNamespace($directory),
            "Entity",
            $name
        );
    }

    /**
     * get service class name
     *
     * @param string|null $name
     * @param array<string> $directory
     * @return string
     */
    public function serviceClass(string|null $name = null, array $directory = []): string
    {
        return $this->getClassName(
            $this->serviceNamespace($directory),
            "Service",
            $name
        );
    }

    /*----------------------------------------*
     * Comment
     *----------------------------------------*/

    /**
     * get comment
     *
     * @param string $className
     * @return string
     */
    protected function comment(string $className): string
    {
        $default = "{$this->nameUpper()} {$className}";

        if (empty($this->directory)) return $default;

        $directoryString = implode(" ", array_map(fn($item) => Text::toPascal($item), $this->directory));

        return "{$directoryString} {$default}";
    }
}
