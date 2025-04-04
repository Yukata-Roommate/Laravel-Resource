<?php

namespace YukataRm\Laravel\Resource\Commands\Conductors;

use YukataRm\Laravel\Resource\Commands\Conductors\Base\ResourceConductor;

use YukataRm\Laravel\Resource\Commands\Extractors\RepositoryExtractor;
use YukataRm\Laravel\Resource\Commands\Modifiers\RepositoryModifier;
use YukataRm\Laravel\Resource\Commands\Creators\RepositoryCreator;

/**
 * Repository Conductor
 *
 * @package YukataRm\Laravel\Resource\Commands\Conductors
 */
class RepositoryConductor extends ResourceConductor
{
    /**
     * extractor
     *
     * @var string
     */
    protected string $extractor = RepositoryExtractor::class;

    /**
     * modifier
     *
     * @var string
     */
    protected string $modifier = RepositoryModifier::class;

    /**
     * creator
     *
     * @var string
     */
    protected string $creator = RepositoryCreator::class;
}
