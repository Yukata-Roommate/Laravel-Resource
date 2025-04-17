<?php

namespace YukataRm\Laravel\Resource\Commands\Extractors;

use YukataRm\Laravel\Resource\Commands\Extractors\Base\ResourceExtractor;

/**
 * Request Entity Extractor
 *
 * @package YukataRm\Laravel\Resource\Commands\Extractors
 */
class RequestEntityExtractor extends ResourceExtractor
{
    /**
     * file directory
     *
     * @var string
     */
    protected string $directory = "request-entity";
}
