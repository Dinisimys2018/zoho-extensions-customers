<?php

namespace App\Components\RestApi\Requests\Rules;

use App\Components\RestApi\Requests\Rules\BasicAbstract\SoftBasicValidation;

#[\Attribute]
class Equal extends SoftBasicValidation
{

    public function __construct(private string|int|float|array|null $comparableValue)
    {
    }

    public function validate(): bool
    {
       return $this->getField()->getValue() == $this->comparableValue;
    }

    public function getErrorMessage(): string
    {
        $value = is_array($this->comparableValue) ?
            '[' . implode(',', $this->comparableValue) . ']' :
            $this->comparableValue;
        return trans('validation.equal', ['attribute' => $this->getField()->getFullName(), 'value' => $value]);
    }
}
