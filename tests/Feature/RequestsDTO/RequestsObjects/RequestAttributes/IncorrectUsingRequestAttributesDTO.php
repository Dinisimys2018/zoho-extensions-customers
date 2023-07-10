<?php

namespace Tests\Feature\RequestsDTO\RequestsObjects\RequestAttributes;

use App\Components\RestApi\Requests\DTO\Attributes\NotValidateDTO;
use App\Components\RestApi\Requests\RequestDTO;

#[NotValidateDTO]
class IncorrectUsingRequestAttributesDTO extends RequestDTO
{
    #[NotValidateDTO]
    public ?int $field;
}
