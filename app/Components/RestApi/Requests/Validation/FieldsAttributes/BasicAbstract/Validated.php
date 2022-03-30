<?php

namespace App\Components\RestApi\Requests\Validation\FieldsAttributes\BasicAbstract;

interface Validated
{
    public function handle(string $field, mixed $value): void;
}
