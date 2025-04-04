<?php

namespace YukataRm\Laravel\Resource\Commands\Conductors;

use YukataRm\Laravel\Resource\Commands\Conductors\Base\MultiTypeResourceConductor;

use YukataRm\Laravel\Resource\Commands\Extractors\RequestExtractor;
use YukataRm\Laravel\Resource\Commands\Modifiers\RequestModifier;
use YukataRm\Laravel\Resource\Commands\Creators\RequestCreator;

/**
 * Request Conductor
 *
 * @package YukataRm\Laravel\Resource\Commands\Conductors
 */
class RequestConductor extends MultiTypeResourceConductor
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
    protected string $extractor = RequestExtractor::class;

    /**
     * modifier
     *
     * @var string
     */
    protected string $modifier = RequestModifier::class;

    /**
     * creator
     *
     * @var string
     */
    protected string $creator = RequestCreator::class;
}
