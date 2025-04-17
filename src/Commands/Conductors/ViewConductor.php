<?php

namespace YukataRm\Laravel\Resource\Commands\Conductors;

use YukataRm\Laravel\Resource\Commands\Conductors\Base\MultiTypeResourceConductor;

use YukataRm\Laravel\Resource\Commands\Extractors\ViewExtractor;
use YukataRm\Laravel\Resource\Commands\Modifiers\ViewModifier;
use YukataRm\Laravel\Resource\Commands\Creators\ViewCreator;

/**
 * View Conductor
 *
 * @package YukataRm\Laravel\Resource\Commands\Conductors
 */
class ViewConductor extends MultiTypeResourceConductor
{
    /**
     * types
     *
     * @var array<string>
     */
    protected array $types = [
        "index",
        "create",
        "show",
        "edit",
    ];

    /**
     * extractor
     *
     * @var string
     */
    protected string $extractor = ViewExtractor::class;

    /**
     * modifier
     *
     * @var string
     */
    protected string $modifier = ViewModifier::class;

    /**
     * creator
     *
     * @var string
     */
    protected string $creator = ViewCreator::class;

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
        return array_merge($this->directory, [$this->target]);
    }

    /**
     * get name for creator
     *
     * @return string
     */
    #[\Override]
    protected function nameForCreator(): string
    {
        return $this->type;
    }
}
