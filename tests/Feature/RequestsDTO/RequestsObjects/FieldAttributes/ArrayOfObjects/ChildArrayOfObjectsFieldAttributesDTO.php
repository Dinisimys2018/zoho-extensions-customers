<?php

namespace Tests\Feature\RequestsDTO\RequestsObjects\FieldAttributes\ArrayOfObjects;

use App\Components\RestApi\Requests\Fields\Attributes\SourceName;
use App\Components\RestApi\Requests\Fields\Attributes\Types\FieldAsObject;
use App\Components\RestApi\Requests\RequestDTO;
use App\Components\RestApi\Requests\Rules\Required;

class ChildArrayOfObjectsFieldAttributesDTO extends RequestDTO
{
    #[Required]
    public string $childField;
}
