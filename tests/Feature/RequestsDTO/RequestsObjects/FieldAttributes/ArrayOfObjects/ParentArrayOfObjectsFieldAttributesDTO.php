<?php

namespace Tests\Feature\RequestsDTO\RequestsObjects\FieldAttributes\ArrayOfObjects;

use App\Components\RestApi\Requests\Fields\Attributes\Types\ArrayOfObjects;
use App\Components\RestApi\Requests\RequestDTO;
use App\Components\RestApi\Requests\Rules\Required;

class ParentArrayOfObjectsFieldAttributesDTO extends RequestDTO
{
    #[Required, ArrayOfObjects(ChildArrayOfObjectsFieldAttributesDTO::class)]
    public array $arrayOfObjects;
}
