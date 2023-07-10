<?php

namespace App\Components\RestApi\Requests\Fields\Attributes\Types;

use App\Components\RestApi\Requests\Fields\Interfaces\Field;
use App\Components\RestApi\Requests\Fields\Attributes\Types\Interfaces\FieldTypeInterface;
use App\Components\RestApi\Response\ExceptionWithResponse;

#[\Attribute(\Attribute::TARGET_PROPERTY)]
class ArrayOfObjects implements FieldTypeInterface
{
    public function __construct(protected string $className)
    {
    }

    public function handle(Field $field): void
    {
        $fieldValue = [];
        $requestValue = $field->getValue();

        if (! is_array($requestValue)) {
            return;
        }

        foreach ($requestValue as $key => $item) {
            try {
                $fieldValue[$key] = $this->generateDTO($field, $key);
            } catch (ExceptionWithResponse $exception) {
            }
        }
        $field->setValue($fieldValue);
    }

    protected function generateDTO(Field $field, int|string $key)
    {
        return $this->className::createFromRequest($field->getFullName() . ".$key");
    }
}
