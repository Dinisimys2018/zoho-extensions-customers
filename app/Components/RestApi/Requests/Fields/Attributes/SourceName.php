<?php
namespace App\Components\RestApi\Requests\Fields\Attributes;

use App\Components\RestApi\Requests\Fields\Attributes\Interfaces\FieldAttributeInterface;
use App\Components\RestApi\Requests\Fields\Interfaces\Field;

#[\Attribute(\Attribute::TARGET_PROPERTY)]
class SourceName implements FieldAttributeInterface
{

    public function __construct(private string $sourceName)
    {
    }

    public function handle(Field $field): void
    {
        $field->setSourceName($this->sourceName);
    }
}
