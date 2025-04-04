<?php

namespace YukataRm\Laravel\Resource\Commands\Conductors\Base;

use YukataRm\Laravel\Resource\Commands\Conductors\Interfaces\ConductorInterface;

use YukataRm\Laravel\Resource\Commands\Extractors\Interfaces\ExtractorInterface;
use YukataRm\Laravel\Resource\Commands\Modifiers\Interfaces\ModifierInterface;
use YukataRm\Laravel\Resource\Commands\Creators\Interfaces\CreatorInterface;

use YukataRm\Text\Proxies\Text;

/**
 * Resource Conductor
 *
 * @package YukataRm\Laravel\Resource\Commands\Conductors\Base
 */
abstract class ResourceConductor implements ConductorInterface
{
    /**
     * extractor
     *
     * @var string
     */
    protected string $extractor;

    /**
     * modifier
     *
     * @var string
     */
    protected string $modifier;

    /**
     * creator
     *
     * @var string
     */
    protected string $creator;

    /*----------------------------------------*
     * Properties
     *----------------------------------------*/

    /**
     * target name
     *
     * @var string
     */
    protected string $target;

    /**
     * directory
     *
     * @var array<string>
     */
    protected array $directory;

    /**
     * make file force
     *
     * @var bool
     */
    protected bool $force;

    /**
     * set command arguments
     *
     * @param string $target
     * @param array<string> $directory
     * @param bool $force
     * @return static
     */
    public function setCommandArguments(string $target, array $directory, bool $force): static
    {
        $this->target    = $target;
        $this->directory = $directory;
        $this->force     = $force;

        return $this;
    }

    /*----------------------------------------*
     * Conduct
     *----------------------------------------*/

    /**
     * conduct create resource
     *
     * @return string
     */
    public function conduct(): string
    {
        $content = $this->extractor()->extract();

        $modified = $this->modifier()->modify($content);

        return $this->creator()->create($modified);
    }

    /*----------------------------------------*
     * Extractor
     *----------------------------------------*/

    /**
     * get Extractor
     *
     * @return \YukataRm\Laravel\Resource\Commands\Extractors\Interfaces\ExtractorInterface
     */
    protected function extractor(): ExtractorInterface
    {
        $extractor = new $this->extractor();

        $extractor->setName($this->nameForExtractor());

        return $extractor;
    }

    /**
     * get name for extractor
     *
     * @return string
     */
    protected function nameForExtractor(): string
    {
        return "default";
    }

    /*----------------------------------------*
     * Modifier
     *----------------------------------------*/

    /**
     * get Modifier
     *
     * @return \YukataRm\Laravel\Resource\Commands\Modifiers\Interfaces\ModifierInterface
     */
    protected function modifier(): ModifierInterface
    {
        $modifier = new $this->modifier();

        $modifier->setDirectory($this->directoryForModifier());
        $modifier->setName($this->nameForModifier());

        return $modifier;
    }

    /**
     * get directory for modifier
     *
     * @return array<string>
     */
    protected function directoryForModifier(): array
    {
        return $this->directory;
    }

    /**
     * get name for modifier
     *
     * @return string
     */
    protected function nameForModifier(): string
    {
        return $this->target;
    }

    /*----------------------------------------*
     * Creator
     *----------------------------------------*/

    /**
     * get Creator
     *
     * @return \YukataRm\Laravel\Resource\Commands\Creators\Interfaces\CreatorInterface
     */
    protected function creator(): CreatorInterface
    {
        $creator = new $this->creator();

        $creator->setDirectory($this->directoryForCreator());
        $creator->setName($this->nameForCreator());
        $creator->setForce($this->force);

        return $creator;
    }

    /**
     * get directory for creator
     *
     * @return array<string>
     */
    protected function directoryForCreator(): array
    {
        return array_map(fn($directory) => Text::toPascal($directory), $this->directory);
    }

    /**
     * get name for creator
     *
     * @return string
     */
    protected function nameForCreator(): string
    {
        return Text::toPascal($this->target);
    }
}
