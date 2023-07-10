<?php

namespace App\Components\RestApi\Requests\Interfaces;

use App\Components\RestApi\Requests\Fields\Interfaces\Field;

interface HandlerFieldInterface
{
    public function handle(Field $field): void;
}
