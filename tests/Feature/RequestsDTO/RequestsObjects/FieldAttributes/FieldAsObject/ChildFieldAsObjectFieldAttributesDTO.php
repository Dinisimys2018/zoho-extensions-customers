<?php

namespace Tests\Feature\RequestsDTO\RequestsObjects\FieldAttributes\FieldAsObject;

use App\Components\RestApi\Requests\Fields\Attributes\SourceName;
use App\Components\RestApi\Requests\Fields\Attributes\Types\FieldAsObject;
use App\Components\RestApi\Requests\RequestDTO;
use App\Components\RestApi\Requests\Rules\Required;

class ChildFieldAsObjectFieldAttributesDTO extends RequestDTO
{
    #[Required]
    public string $childField;
}
