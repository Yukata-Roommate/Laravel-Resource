<?php

namespace YukataRm\Laravel\Resource\Commands\Conductors\Interfaces;

use YukataRm\Laravel\Resource\Commands\Conductors\Interfaces\ConductorInterface;

/**
 * Multi Type Conductor Interface
 *
 * @package YukataRm\Laravel\Resource\Commands\Conductors\Interfaces
 */
interface MultiTypeConductorInterface extends ConductorInterface
{
    /**
     * conduct create resources
     *
     * @return \Iterator<string>
     */
    public function conducts(): \Iterator;
}
