<?php

namespace YukataRm\Laravel\Resource\Commands\Conductors;

use YukataRm\Laravel\Resource\Commands\Conductors\Base\ResourceConductor;

use YukataRm\Laravel\Resource\Commands\Extractors\RepositoryEntityExtractor;
use YukataRm\Laravel\Resource\Commands\Modifiers\RepositoryEntityModifier;
use YukataRm\Laravel\Resource\Commands\Creators\RepositoryEntityCreator;

/**
 * Repository Entity Conductor
 *
 * @package YukataRm\Laravel\Resource\Commands\Conductors
 */
class RepositoryEntityConductor extends ResourceConductor
{
    /**
     * extractor
     *
     * @var string
     */
    protected string $extractor = RepositoryEntityExtractor::class;

    /**
     * modifier
     *
     * @var string
     */
    protected string $modifier = RepositoryEntityModifier::class;

    /**
     * creator
     *
     * @var string
     */
    protected string $creator = RepositoryEntityCreator::class;
}
