<?php

namespace Tests\Feature\RequestsDTO\RequestsObjects\FieldAttributes;

use App\Components\RestApi\Requests\Fields\Attributes\SourceName;
use App\Components\RestApi\Requests\RequestDTO;
use App\Components\RestApi\Requests\Rules\Required;

#[SourceName('test')]
class IncorrectUsingFieldAttributesDTO extends RequestDTO
{


    #[SourceName('changeFieldName'), Required]
    public ?string $field;
}
