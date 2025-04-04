<?php

namespace YukataRm\Laravel\Resource\Commands\Conductors;

use YukataRm\Laravel\Resource\Commands\Conductors\Base\ResourceConductor;

use YukataRm\Laravel\Resource\Commands\Extractors\ModelExtractor;
use YukataRm\Laravel\Resource\Commands\Modifiers\ModelModifier;
use YukataRm\Laravel\Resource\Commands\Creators\ModelCreator;

/**
 * Model Conductor
 *
 * @package YukataRm\Laravel\Resource\Commands\Conductors
 */
class ModelConductor extends ResourceConductor
{
    /**
     * extractor
     *
     * @var string
     */
    protected string $extractor = ModelExtractor::class;

    /**
     * modifier
     *
     * @var string
     */
    protected string $modifier = ModelModifier::class;

    /**
     * creator
     *
     * @var string
     */
    protected string $creator = ModelCreator::class;
}
