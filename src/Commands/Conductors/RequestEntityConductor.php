<?php

namespace YukataRm\Laravel\Resource\Commands\Conductors;

use YukataRm\Laravel\Resource\Commands\Conductors\Base\MultiTypeResourceConductor;

use YukataRm\Laravel\Resource\Commands\Extractors\RequestEntityExtractor;
use YukataRm\Laravel\Resource\Commands\Modifiers\RequestEntityModifier;
use YukataRm\Laravel\Resource\Commands\Creators\RequestEntityCreator;

/**
 * Request Entity Conductor
 *
 * @package YukataRm\Laravel\Resource\Commands\Conductors
 */
class RequestEntityConductor extends MultiTypeResourceConductor
{
    /**
     * types
     *
     * @var array<string>
     */
    protected array $types = [
        "index",
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
    protected string $extractor = RequestEntityExtractor::class;

    /**
     * modifier
     *
     * @var string
     */
    protected string $modifier = RequestEntityModifier::class;

    /**
     * creator
     *
     * @var string
     */
    protected string $creator = RequestEntityCreator::class;
}
