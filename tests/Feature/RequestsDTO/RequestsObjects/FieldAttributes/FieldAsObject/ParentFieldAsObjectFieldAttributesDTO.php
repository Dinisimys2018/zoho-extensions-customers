<?php

namespace Tests\Feature\RequestsDTO\RequestsObjects\FieldAttributes\FieldAsObject;

use App\Components\RestApi\Requests\Fields\Attributes\SourceName;
use App\Components\RestApi\Requests\Fields\Attributes\Types\FieldAsObject;
use App\Components\RestApi\Requests\RequestDTO;

class ParentFieldAsObjectFieldAttributesDTO extends RequestDTO
{
    #[FieldAsObject]
    public ChildFieldAsObjectFieldAttributesDTO $fieldAsObject;
}
