<?php

namespace YukataRm\Laravel\Resource\Request;

use YukataRm\Laravel\Request\BaseRequest;
use YukataRm\Laravel\Validation\Facades\Rules;

/**
 * Destroy Request
 *
 * @package YukataRm\Laravel\Resource\Request
 */
abstract class DestroyRequest extends BaseRequest
{
    /**
     * table name
     *
     * @var string
     */
    protected string $tableName;

    /**
     * get Validation Rules array
     *
     * @return array<\YukataRm\Laravel\Validation\Interfaces\Rules\ValidationRulesInterface>
     */
    protected function validations(): array
    {
        return [
            Rules::required("id")->id($this->tableName),
        ];
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
