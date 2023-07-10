<?php

namespace Feature\RequestsDTO\TestCases\Rules\Simple;

use Tests\Feature\RequestsDTO\TestCases\Basic;
use Tests\Feature\RequestsDTO\RequestsObjects\Rules\Simple\EqualSimpleRuleDTO;

class EqualRuleDataViaGETTest extends Basic
{
    protected function getRequestDTO(): string
    {
        return EqualSimpleRuleDTO::class;
    }

    public function testSuccessEqualRule()
    {
        $queryString = 'field_float=5.5&';
        $queryString .= 'field_integer=5&';
        $queryString .= 'field_string=string&';
        $queryString .= 'field_array[]=1&';
        $queryString .= 'field_array[]=2&';
        $queryString .= 'field_array[]=3';

        $response = $this->makeResponse($queryString);

        $response->assertOk()
            ->assertJsonPath('meta.status', 'success');
    }

    public function testErrorEqualRule()
    {
        $response = $this->makeResponse('');

        $response->assertStatus(400)
            ->assertJsonPath('meta.status', 'error')
            ->assertJsonPath('meta.message', 'Validation error')
            ->assertJsonPath('data.field_integer', ['The field_integer must be equal to 5'])
            ->assertJsonPath('data.field_float', ['The field_float must be equal to 5.5'])
            ->assertJsonPath('data.field_string', ['The field_string must be equal to string'])
            ->assertJsonPath('data.field_array', ['The field_array must be equal to [1,2,3]']);
    }

}
