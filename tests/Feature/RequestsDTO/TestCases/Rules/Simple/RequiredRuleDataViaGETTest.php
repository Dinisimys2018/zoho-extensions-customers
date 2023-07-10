<?php

namespace Feature\RequestsDTO\TestCases\Rules\Simple;

use Tests\Feature\RequestsDTO\TestCases\Basic;
use Tests\Feature\RequestsDTO\RequestsObjects\Rules\Simple\RequiredSimpleRuleDTO;

class RequiredRuleDataViaGETTest extends Basic
{

    protected function getRequestDTO(): string
    {
        return RequiredSimpleRuleDTO::class;
    }

    public function testFieldValuePassed()
    {
        $queryString = 'field=value';

        $response = $this->makeResponse($queryString);

        $response->assertOk()
            ->assertJsonPath('meta.status', 'success');
    }

    public function testFieldValueNotPassed()
    {
        $response = $this->makeResponse('');

        $response->assertStatus(400)
            ->assertJsonPath('meta.status', 'error')
            ->assertJsonPath('meta.message', 'Validation error')
            ->assertJsonPath('data.field', ['The field field is required.']);
    }

}
