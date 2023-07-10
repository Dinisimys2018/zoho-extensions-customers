<?php

namespace Tests\Feature\RequestsDTO\RequestsObjects\FieldAttributes\SourceType;

use App\Components\RestApi\Requests\Fields\Attributes\SourceTypes\SourceType;
use App\Components\RestApi\Requests\Fields\Attributes\SourceTypes\SourceTypesEnum;
use App\Components\RestApi\Requests\RequestDTO;
use App\Components\RestApi\Requests\Rules\Required;

class JSONSourceTypeFieldAttributesDTO extends RequestDTO
{
    #[SourceType(SourceTypesEnum::JSON), Required]
    public string $field;
}
