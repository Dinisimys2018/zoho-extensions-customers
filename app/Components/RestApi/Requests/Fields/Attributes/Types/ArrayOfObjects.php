<?php

namespace App\Components\RestApi\Requests\Fields\Attributes\Types;

use App\Components\RestApi\Requests\Fields\Interfaces\Field;
use App\Components\RestApi\Requests\Fields\Attributes\Types\Interfaces\FieldTypeInterface;

#[\Attribute]
class ArrayOfObjects implements FieldTypeInterface
{
    public function handle(Field $field): void
    {
        // TODO: Implement handle() method.
    }
}
