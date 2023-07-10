<?php

namespace Tests\Feature\RequestsDTO\RequestsObjects\RequestAttributes;

use App\Components\RestApi\Requests\DTO\Attributes\NotValidateDTO;
use App\Components\RestApi\Requests\RequestDTO;
use App\Components\RestApi\Requests\Rules\Equal;
use App\Components\RestApi\Requests\Rules\Required;

#[NotValidateDTO]
class NotValidateRequestAttributesDTO extends RequestDTO
{
    #[Equal(5)]
    public ?int $fieldEqual;

    #[Required]
    public ?int $fieldRequired;
}
