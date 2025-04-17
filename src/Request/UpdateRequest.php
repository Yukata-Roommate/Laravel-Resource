<?php

namespace YukataRm\Laravel\Resource\Request;

use YukataRm\Laravel\Request\BaseRequest;
use YukataRm\Laravel\Validation\Facades\Rules;

/**
 * Update Request
 *
 * @package YukataRm\Laravel\Resource\Request
 */
abstract class UpdateRequest extends BaseRequest
{
    /**
     * table name
     *
     * @var string
     */
    protected string $tableName;

    /**
     * set Validation array
     *
     * @return void
     */
    #[\Override]
    protected function setValidations(): void
    {
        parent::setValidations();

        $this->validations = array_merge(
            $this->validations,
            [
                Rules::required("id")->id($this->tableName),
            ]
        );
    }

    /**
     * get additional data for validation
     *
     * @return array<string, mixed>
     */
    #[\Override]
    protected function additionalData(): array
    {
        $this->additionalData = array_merge(
            $this->additionalData,
            ["id"]
        );

        return parent::additionalData();
    }
}
