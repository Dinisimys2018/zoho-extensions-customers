<?php

namespace Tests\Feature\RequestsDTO\RequestsObjects\FieldAttributes\SourceType;

use App\Components\RestApi\Requests\Fields\Attributes\SourceTypes\SourceType;
use App\Components\RestApi\Requests\Fields\Attributes\SourceTypes\SourceTypesEnum;
use App\Components\RestApi\Requests\RequestDTO;
use App\Components\RestApi\Requests\Rules\Required;

class InputSourceTypeFieldAttributesDTO extends RequestDTO
{
    #[SourceType(SourceTypesEnum::INPUT), Required]
    public string $field;
}
