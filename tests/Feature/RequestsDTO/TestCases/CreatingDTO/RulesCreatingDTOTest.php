<?php

namespace Feature\RequestsDTO\TestCases\CreatingDTO;

use Illuminate\Http\Request;
use Tests\Feature\RequestsDTO\RequestsObjects\Rules\Combinations\RulesDTO;
use Tests\Feature\RequestsDTO\TestCases\CreatingDTO\Basic;

class RulesCreatingDTOTest extends Basic
{
    protected function getRequest(): Request
    {
        $request = new Request([],$this->getData());
        $request->setMethod('POST');
        return $request;
    }

    protected function getData(): array
    {
        return  [
            'field_equal' => 5,
            'field_required' => 22,
            'extension_id' => 1,
            'field_array' => [1,2,3],
            'token' => config('zoho.tokens.market'),
            'optional_field_second' => 22,
            'field_not_exists' => 150
        ];
    }

    public function testDtoIsCorrectlyFilled()
    {
        $dto = RulesDTO::createFromRequest();

        $this->assertEquals(5, $dto->fieldEqual);
        $this->assertEquals(22, $dto->fieldRequired);
        $this->assertEquals(1, $dto->extensionId);
        $this->assertEquals([1,2,3], $dto->fieldArray);
        $this->assertEquals(config('zoho.tokens.market'), $dto->token);
        $this->assertEquals(22, $dto->optionalFieldSecond);
        $this->assertEquals(null, $dto->optionalFieldFirst);
        $this->assertObjectNotHasAttribute('fieldNotExists', $dto);
    }
}
