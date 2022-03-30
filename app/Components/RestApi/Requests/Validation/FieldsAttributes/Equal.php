<?php

namespace App\Components\RestApi\Requests\Validation\FieldsAttributes;

use App\Components\RestApi\Requests\Validation\FieldsAttributes\BasicAbstract\SoftBasicValidation;

#[\Attribute]
class Equal extends SoftBasicValidation
{

    public function __construct(private string|int|float|null $comparableValue)
    {
    }

    public function validate(): bool
    {
       return $this->getValue() == $this->comparableValue;
    }

    public function getErrorMessage(): string
    {
        return "The field [{$this->getField()}] must be equal to the value [$this->comparableValue]";
    }
}
