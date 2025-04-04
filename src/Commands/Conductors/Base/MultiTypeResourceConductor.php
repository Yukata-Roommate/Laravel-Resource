<?php

namespace YukataRm\Laravel\Resource\Commands\Conductors\Base;

use YukataRm\Laravel\Resource\Commands\Conductors\Interfaces\MultiTypeConductorInterface;
use YukataRm\Laravel\Resource\Commands\Conductors\Base\ResourceConductor;

use YukataRm\Text\Proxies\Text;

/**
 * Multi Type Resource Conductor
 *
 * @package YukataRm\Laravel\Resource\Commands\Conductors\Base
 */
abstract class MultiTypeResourceConductor extends ResourceConductor implements MultiTypeConductorInterface
{
    /**
     * types
     *
     * @var array<string>
     */
    protected array $types;

    /**
     * target type
     *
     * @var string
     */
    protected string $type;

    /**
     * conduct create resources
     *
     * @return \Iterator<string>
     */
    public function conducts(): \Iterator
    {
        foreach ($this->types as $type) {
            $this->type = $type;

            yield $this->conduct();
        }
    }

    /*----------------------------------------*
     * Extractor
     *----------------------------------------*/

    /**
     * get name for extractor
     *
     * @return string
     */
    #[\Override]
    protected function nameForExtractor(): string
    {
        return $this->type;
    }

    /*----------------------------------------*
     * Modifier
     *----------------------------------------*/

    /**
     * get directory for modifier
     *
     * @return array<string>
     */
    #[\Override]
    protected function directoryForModifier(): array
    {
        return array_merge($this->directory, [$this->target]);
    }

    /**
     * get name for modifier
     *
     * @return string
     */
    #[\Override]
    protected function nameForModifier(): string
    {
        return $this->type;
    }

    /*----------------------------------------*
     * Creator
     *----------------------------------------*/

    /**
     * get directory for creator
     *
     * @return array<string>
     */
    #[\Override]
    protected function directoryForCreator(): array
    {
        return array_map(fn($directory) => Text::toPascal($directory), array_merge($this->directory, [$this->target]));
    }

    /**
     * get name for creator
     *
     * @return string
     */
    #[\Override]
    protected function nameForCreator(): string
    {
        return Text::toPascal($this->type);
    }
}
