<?php

namespace Tests\Feature\RequestsDTO\RequestsObjects\FieldAttributes;

use App\Components\RestApi\Requests\Fields\Attributes\SourceName;
use App\Components\RestApi\Requests\RequestDTO;
use App\Components\RestApi\Requests\Rules\Required;

class SourceNameFieldAttributesDTO extends RequestDTO
{
    #[SourceName('changeFieldName'), Required]
    public ?string $field;
}
