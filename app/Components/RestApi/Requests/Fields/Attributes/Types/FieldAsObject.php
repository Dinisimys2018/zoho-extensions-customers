<?php

namespace App\Components\RestApi\Requests\Fields\Attributes\Types;

use App\Components\RestApi\Requests\Fields\Attributes\Types\Interfaces\FieldTypeInterface;
use App\Components\RestApi\Requests\Fields\Interfaces\Field;
use App\Components\RestApi\Response\ExceptionWithResponse;

#[\Attribute(\Attribute::TARGET_PROPERTY)]
class FieldAsObject implements FieldTypeInterface
{
    public function handle(Field $field): void
    {
        try {
            $field->setValue($this->generateDTO($field));
        } catch (ExceptionWithResponse $exception) {
        }
    }

    protected function generateDTO(Field $field)
    {
        return $field->getType()::createFromRequest($field->getFullName());
    }
}
