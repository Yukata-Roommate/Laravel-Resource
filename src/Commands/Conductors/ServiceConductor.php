<?php

namespace YukataRm\Laravel\Resource\Commands\Conductors;

use YukataRm\Laravel\Resource\Commands\Conductors\Base\MultiTypeResourceConductor;

use YukataRm\Laravel\Resource\Commands\Extractors\ServiceExtractor;
use YukataRm\Laravel\Resource\Commands\Modifiers\ServiceModifier;
use YukataRm\Laravel\Resource\Commands\Creators\ServiceCreator;

/**
 * Service Conductor
 *
 * @package YukataRm\Laravel\Resource\Commands\Conductors
 */
class ServiceConductor extends MultiTypeResourceConductor
{
    /**
     * types
     *
     * @var array<string>
     */
    protected array $types = [
        "index",
        "create",
        "store",
        "show",
        "edit",
        "update",
        "destroy",
    ];

    /**
     * extractor
     *
     * @var string
     */
    protected string $extractor = ServiceExtractor::class;

    /**
     * modifier
     *
     * @var string
     */
    protected string $modifier = ServiceModifier::class;

    /**
     * creator
     *
     * @var string
     */
    protected string $creator = ServiceCreator::class;
}
