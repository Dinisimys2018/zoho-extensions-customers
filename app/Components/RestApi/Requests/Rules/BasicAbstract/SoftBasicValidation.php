<?php

namespace App\Components\RestApi\Requests\Rules\BasicAbstract;

use App\Components\RestApi\Requests\Validation\ValidationErrorsContainer;

abstract class SoftBasicValidation extends BasicValidation
{
    abstract public function getErrorMessage(): string;

    public function fail(): void
    {
        app(ValidationErrorsContainer::class)->put($this->getField()->getFullName(), $this->getErrorMessage());
    }
}
