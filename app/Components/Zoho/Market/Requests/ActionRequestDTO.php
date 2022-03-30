<?php

namespace App\Components\Zoho\Market\Requests;

use App\Components\RestApi\Requests\Attributes\Handlers\ToLogBefore;
use App\Components\RestApi\Requests\RequestDTO;
use App\Components\RestApi\Requests\Validation\FieldsAttributes\ExistsInDB;
use App\Components\RestApi\Requests\Validation\FieldsAttributes\NotEmpty;
use App\Components\RestApi\Requests\Validation\FieldsAttributes\Token;

#[ToLogBefore]
class ActionRequestDTO extends RequestDTO
{
    #[Token('zoho.tokens.market')]
    public string $token;

    #[NotEmpty]
    public string $companyId;

    #[NotEmpty, ExistsInDB('extensions')]
    public string $extensionId;

    #[NotEmpty]
    public string $email;

    public ?string $zapikey;
}
