<?php

namespace App\Components\RestApi\Requests\Rules;

use App\Components\RestApi\Requests\Rules\BasicAbstract\SoftBasicValidation;

#[\Attribute]
class Required extends SoftBasicValidation
{
    public function validate(): bool
    {
       return !empty($this->getField()->getValue());
    }

    public function getErrorMessage(): string
    {
        return trans('validation.required', ['attribute' => $this->getField()->getFullName()]);
    }
}
