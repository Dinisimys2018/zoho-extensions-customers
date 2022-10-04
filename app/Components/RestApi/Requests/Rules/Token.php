<?php

namespace App\Components\RestApi\Requests\Rules;

use App\Components\RestApi\Requests\Rules\BasicAbstract\CriticalBasicValidation;
use App\Components\RestApi\Response\JsonResponse;

#[\Attribute]
class Token extends CriticalBasicValidation
{
    public function __construct(private string $configKey)
    {
    }

    public function validate(): bool
    {
        return $this->getField()->getValue() == config($this->configKey);
    }

    public function fail(): void
    {
        app(JsonResponse::class)->throw()->unauthorized();
    }
}
