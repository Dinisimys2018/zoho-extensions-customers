<?php

namespace Tests\Feature\RequestsDTO\RequestsObjects\Rules\Simple;

use App\Components\RestApi\Requests\RequestDTO;
use App\Components\RestApi\Requests\Rules\Token;

class TokenSimpleRuleDTO extends RequestDTO
{
    #[Token('zoho.tokens.market')]
    public string $token;
}
