<?php

namespace App\Components\Zoho\Market\Requests;

use App\Components\RestApi\Requests\RequestDTO;
use App\Components\RestApi\Requests\Rules\ExistsInDB;
use App\Components\RestApi\Requests\Rules\Required;
use App\Components\RestApi\Requests\Rules\Token;

class ActionRequestDTO extends RequestDTO
{
    #[Token('zoho.tokens.market')]
    public string $token;

    #[Required]
    public string $companyId;

    #[Required, ExistsInDB('extensions')]
    public string $extensionId;

    #[Required]
    public string $email;

    public ?string $zapikey;
}
