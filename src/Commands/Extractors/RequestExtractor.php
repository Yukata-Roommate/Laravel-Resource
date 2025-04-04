<?php

namespace YukataRm\Laravel\Resource\Commands\Extractors;

use YukataRm\Laravel\Resource\Commands\Extractors\Base\ResourceExtractor;

/**
 * Request Extractor
 *
 * @package YukataRm\Laravel\Resource\Commands\Extractors
 */
class RequestExtractor extends ResourceExtractor
{
    /**
     * file directory
     *
     * @var string
     */
    protected string $directory = "request";
}
