<?php

namespace YukataRm\Laravel\Resource\Commands\Extractors;

use YukataRm\Laravel\Resource\Commands\Extractors\Base\ResourceExtractor;

/**
 * Repository Extractor
 *
 * @package YukataRm\Laravel\Resource\Commands\Extractors
 */
class RepositoryExtractor extends ResourceExtractor
{
    /**
     * file directory
     *
     * @var string
     */
    protected string $directory = "repository";
}
