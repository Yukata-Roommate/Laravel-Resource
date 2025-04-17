<?php

namespace YukataRm\Laravel\Resource\Commands\Extractors;

use YukataRm\Laravel\Resource\Commands\Extractors\Base\ResourceExtractor;

/**
 * Model Extractor
 *
 * @package YukataRm\Laravel\Resource\Commands\Extractors
 */
class ModelExtractor extends ResourceExtractor
{
    /**
     * file directory
     *
     * @var string
     */
    protected string $directory = "model";
}
