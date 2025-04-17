<?php

namespace YukataRm\Laravel\Resource\Commands\Creators\Base;

use YukataRm\Laravel\Resource\Commands\Creators\Base\ResourceCreator;

/**
 * Entity Resource Creator
 *
 * @package YukataRm\Laravel\Resource\Commands\Creators\Base
 */
abstract class EntityResourceCreator extends ResourceCreator
{
    /*----------------------------------------*
     * Values
     *----------------------------------------*/

    /**
     * set values
     *
     * @return void
     */
    #[\Override]
    protected function setValues(): void
    {
        $this->directory[] = "Entities";

        parent::setValues();
    }
}
