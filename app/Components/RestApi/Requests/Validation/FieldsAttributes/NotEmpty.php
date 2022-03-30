<?php

namespace App\Components\RestApi\Requests\Validation\FieldsAttributes;

use App\Components\RestApi\Requests\Validation\FieldsAttributes\BasicAbstract\SoftBasicValidation;

#[\Attribute]
class NotEmpty extends SoftBasicValidation
{
    public function validate(): bool
    {
       return !empty($this->getValue());
    }

    public function getErrorMessage(): string
    {
        return "The field [{$this->getField()}] must not be empty";
    }
}
