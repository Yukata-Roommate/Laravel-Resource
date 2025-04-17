<?php

namespace YukataRm\Laravel\Resource\Request\Entity;

use YukataRm\Laravel\Request\Entity\BaseEntity;

/**
 * Update Request Entity
 *
 * @package YukataRm\Laravel\Resource\Request\Entity
 */
abstract class UpdateEntity extends BaseEntity
{
    /**
     * id
     *
     * @var int
     */
    public int $id;

    /**
     * prepare bind properties
     *
     * @return void
     */
    protected function prepare(): void
    {
        $this->id = $this->int("id");
    }
}
