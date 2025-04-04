<?php

namespace YukataRm\Laravel\Resource\Commands\Extractors;

use YukataRm\Laravel\Resource\Commands\Extractors\Base\ResourceExtractor;

/**
 * Repository Entity Extractor
 *
 * @package YukataRm\Laravel\Resource\Commands\Extractors
 */
class RepositoryEntityExtractor extends ResourceExtractor
{
    /**
     * file directory
     *
     * @var string
     */
    protected string $directory = "repository-entity";
}
