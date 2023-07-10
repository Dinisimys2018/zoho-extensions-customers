<?php

namespace Tests\Feature\RequestsDTO\RequestsObjects\Rules\Simple;

use App\Components\RestApi\Requests\RequestDTO;
use App\Components\RestApi\Requests\Rules\ExistsInDB;

class ExistsInDBSimpleRuleDTO extends RequestDTO
{
    #[ExistsInDB('extensions')]
    public string $extensionId;
}
