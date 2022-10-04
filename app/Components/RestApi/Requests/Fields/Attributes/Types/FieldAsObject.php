<?php

namespace App\Components\RestApi\Requests\Fields\Attributes\Types;

use App\Components\RestApi\Requests\Fields\Attributes\Types\Interfaces\FieldTypeInterface;
use App\Components\RestApi\Requests\Fields\Interfaces\Field;

#[\Attribute]
class FieldAsObject implements FieldTypeInterface
{
    public function handle(Field $field): void
    {
        $field->setValue($this->generateDTO($field));
    }

    protected function generateDTO(Field $field)
    {
        return $field->getType()::createFromRequest($field->getFullName());
    }
}
