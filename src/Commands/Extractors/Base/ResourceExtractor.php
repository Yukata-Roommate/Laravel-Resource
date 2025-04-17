<?php

namespace YukataRm\Laravel\Resource\Commands\Extractors\Base;

use YukataRm\Laravel\Resource\Commands\Extractors\Interfaces\ExtractorInterface;

use Illuminate\Support\Facades\File;

/**
 * Resource Extractor
 *
 * @package YukataRm\Laravel\Resource\Commands\Extractors\Base
 */
abstract class ResourceExtractor implements ExtractorInterface
{
    /**
     * base file directory
     *
     * @var string
     */
    protected string $baseDirectory = __DIR__ . "/../../../../stubs";

    /**
     * file directory
     *
     * @var string
     */
    protected string $directory;

    /**
     * common file name
     *
     * @var string
     */
    protected string $commonName = ".stub";

    /*----------------------------------------*
     * Properties
     *----------------------------------------*/

    /**
     * file path
     *
     * @var string
     */
    protected string $filePath;

    /**
     * set file name
     *
     * @param string $name
     * @return static
     */
    public function setName(string $name): static
    {
        $this->filePath = "{$this->baseDirectory}/{$this->directory}/{$name}{$this->commonName}";

        return $this;
    }

    /*----------------------------------------*
     * Extract
     *----------------------------------------*/

    /**
     * extract file content
     *
     * @return string
     */
    public function extract(): string
    {
        if (!File::exists($this->filePath)) throw new \Exception(sprintf("[%s] get content failed.", $this->filePath));

        $content = $this->getContent();

        if(empty($content)) throw new \Exception(sprintf("[%s] content is empty.", $this->filePath));

        return $content;
    }

    /**
     * get stub file content
     *
     * @return string
     */
    protected function getContent(): string
    {
        return File::get($this->filePath);
    }
}
