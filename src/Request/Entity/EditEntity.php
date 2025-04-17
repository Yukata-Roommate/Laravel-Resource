<?php

namespace YukataRm\Laravel\Resource\Request\Entity;

use YukataRm\Laravel\Request\Entity\BaseEntity;

/**
 * Edit Request Entity
 *
 * @package YukataRm\Laravel\Resource\Request\Entity
 */
abstract class EditEntity extends BaseEntity
{
    /**
     * id
     *
     * @var int
     */
    public int $id;

    /**
     * bind property
     *
     * @return void
     */
    public function bind(): void
    {
        $this->id = $this->int("id");
    }
}
