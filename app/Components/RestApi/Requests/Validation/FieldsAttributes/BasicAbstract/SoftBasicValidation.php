<?php

namespace App\Components\RestApi\Requests\Validation\FieldsAttributes\BasicAbstract;

use App\Components\RestApi\Requests\Validation\ValidationErrorsContainer;

abstract class SoftBasicValidation extends BasicValidation
{
    abstract public function getErrorMessage(): string;

    public function fail(): void
    {
        app(ValidationErrorsContainer::class)->put($this->getField(), $this->getErrorMessage());
    }
}
