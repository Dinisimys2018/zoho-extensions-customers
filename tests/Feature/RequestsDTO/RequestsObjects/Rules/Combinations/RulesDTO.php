<?php

namespace Tests\Feature\RequestsDTO\RequestsObjects\Rules\Combinations;

use App\Components\RestApi\Requests\RequestDTO;
use App\Components\RestApi\Requests\Rules\Equal;
use App\Components\RestApi\Requests\Rules\ExistsInDB;
use App\Components\RestApi\Requests\Rules\Required;
use App\Components\RestApi\Requests\Rules\Token;

class RulesDTO extends RequestDTO
{
    #[Equal(5)]
    public int $fieldEqual;

    #[Required]
    public float $fieldRequired;

    #[ExistsInDB('extensions')]
    public string $extensionId;

    #[Equal([1,2,3])]
    public array $fieldArray;

    #[Token('zoho.tokens.market')]
    public string $token;

    public ?string $optionalFieldFirst;

    public ?string $optionalFieldSecond;



}
