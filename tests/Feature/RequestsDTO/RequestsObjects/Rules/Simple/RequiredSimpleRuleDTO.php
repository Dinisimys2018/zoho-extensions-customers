<?php

namespace Tests\Feature\RequestsDTO\RequestsObjects\Rules\Simple;

use App\Components\RestApi\Requests\RequestDTO;
use App\Components\RestApi\Requests\Rules\Required;

class RequiredSimpleRuleDTO extends RequestDTO
{
    #[Required]
    public string $field;
}
