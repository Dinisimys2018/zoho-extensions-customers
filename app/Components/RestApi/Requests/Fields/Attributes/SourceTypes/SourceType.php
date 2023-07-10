<?php
namespace App\Components\RestApi\Requests\Fields\Attributes\SourceTypes;

use App\Components\RestApi\Requests\Fields\Attributes\Interfaces\FieldAttributeInterface;
use App\Components\RestApi\Requests\Fields\Interfaces\Field;

#[\Attribute(\Attribute::TARGET_PROPERTY)]
class SourceType implements FieldAttributeInterface
{
    public function __construct(private SourceTypesEnum $sourceType)
    {
    }
    public function handle(Field $field): void
    {
        $field->setSourceType($this->sourceType);
    }
}
