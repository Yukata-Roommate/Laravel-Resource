<?php

namespace YukataRm\Laravel\Resource\Commands\Extractors;

use YukataRm\Laravel\Resource\Commands\Extractors\Base\ResourceExtractor;

/**
 * View Extractor
 *
 * @package YukataRm\Laravel\Resource\Commands\Extractors
 */
class ViewExtractor extends ResourceExtractor
{
    /**
     * file directory
     *
     * @var string
     */
    protected string $directory = "view";

    /**
     * common file name
     *
     * @var string
     */
    protected string $commonName = ".blade.stub";
}
