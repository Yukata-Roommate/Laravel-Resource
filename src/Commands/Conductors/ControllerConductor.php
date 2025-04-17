<?php

namespace YukataRm\Laravel\Resource\Commands\Conductors;

use YukataRm\Laravel\Resource\Commands\Conductors\Base\ResourceConductor;

use YukataRm\Laravel\Resource\Commands\Extractors\ControllerExtractor;
use YukataRm\Laravel\Resource\Commands\Modifiers\ControllerModifier;
use YukataRm\Laravel\Resource\Commands\Creators\ControllerCreator;

/**
 * Controller Conductor
 *
 * @package YukataRm\Laravel\Resource\Commands\Conductors
 */
class ControllerConductor extends ResourceConductor
{
    /**
     * extractor
     *
     * @var string
     */
    protected string $extractor = ControllerExtractor::class;

    /**
     * modifier
     *
     * @var string
     */
    protected string $modifier = ControllerModifier::class;

    /**
     * creator
     *
     * @var string
     */
    protected string $creator = ControllerCreator::class;
}
