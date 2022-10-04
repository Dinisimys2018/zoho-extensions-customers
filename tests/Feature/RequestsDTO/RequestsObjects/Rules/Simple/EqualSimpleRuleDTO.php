<?php

namespace Tests\Feature\RequestsDTO\RequestsObjects\Rules\Simple;

use App\Components\RestApi\Requests\RequestDTO;
use App\Components\RestApi\Requests\Rules\Equal;
use App\Components\RestApi\Requests\Rules\Required;

class EqualSimpleRuleDTO extends RequestDTO
{
    #[Equal(5)]
    public int $fieldInteger;

    #[Equal(5.5)]
    public float $fieldFloat;

    #[Equal('string')]
    public string $fieldString;

    #[Equal([1,2,3])]
    public array $fieldArray;
}
