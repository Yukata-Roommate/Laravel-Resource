<?php

namespace YukataRm\Laravel\Resource\Commands\Creators\Base;

use YukataRm\Laravel\Resource\Commands\Creators\Interfaces\CreatorInterface;

use Illuminate\Support\Facades\File;

/**
 * Resource Creator
 *
 * @package YukataRm\Laravel\Resource\Commands\Creators\Base
 */
abstract class ResourceCreator implements CreatorInterface
{
    /**
     * base file directory
     *
     * @return string
     */
    abstract protected function baseDirectory(): string;

    /**
     * base file name
     *
     * @var string
     */
    protected string $baseName;

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
     * force create
     *
     * @var bool
     */
    protected bool $force = false;

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
     * set force create
     *
     * @param bool $force
     * @return static
     */
    public function setForce(bool $force): static
    {
        $this->force = $force;

        return $this;
    }

    /*----------------------------------------*
     * Values
     *----------------------------------------*/

    /**
     * file directory string
     *
     * @var string
     */
    protected string $directoryString;

    /**
     * file path
     *
     * @var string
     */
    protected string $filePath;

    /**
     * set values
     *
     * @return void
     */
    protected function setValues(): void
    {
        $this->directoryString = empty($this->directory)
            ? $this->baseDirectory()
            : $this->baseDirectory() . DIRECTORY_SEPARATOR . implode(DIRECTORY_SEPARATOR, $this->directory);

        $this->filePath = $this->directoryString . DIRECTORY_SEPARATOR . $this->name . $this->baseName . ".php";
    }

    /*----------------------------------------*
     * Create
     *----------------------------------------*/

    /**
     * create file
     *
     * @param string $content
     * @return string
     */
    public function create(string $content): string
    {
        $this->setValues();

        if (!$this->isCreate()) throw new \Exception(sprintf("[%s] already exists.", $this->filePath));

        $this->makeDirectory();

        $this->createFile($content);

        return $this->filePath;
    }

    /**
     * whether create file
     *
     * @return bool
     */
    protected function isCreate(): bool
    {
        return !File::exists($this->filePath) || $this->force;
    }

    /**
     * make directory
     *
     * @return void
     */
    protected function makeDirectory(): void
    {
        if (File::isDirectory($this->directoryString)) return;

        $result = File::makeDirectory($this->directoryString, 0755, true);

        if (!$result) throw new \Exception(sprintf("[%s] make directory failed.", $this->directoryString));
    }

    /**
     * create file
     *
     * @param string $content
     * @return void
     */
    protected function createFile(string $content): void
    {
        $result = File::put($this->filePath, $content) !== false;

        if (!$result) throw new \Exception(sprintf("[%s] create file failed.", $this->filePath));
    }
}
