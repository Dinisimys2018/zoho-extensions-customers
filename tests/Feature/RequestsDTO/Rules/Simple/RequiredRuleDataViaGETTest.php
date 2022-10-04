<?php

namespace Feature\RequestsDTO\Rules\Simple;

use Tests\Feature\RequestsDTO\Basic;
use Tests\Feature\RequestsDTO\RequestsObjects\Rules\Simple\RequiredSimpleRuleDTO;

class RequiredRuleDataViaGETTest extends Basic
{

    protected function getHTTPMethod(): string
    {
        return 'get';
    }

    protected function getRequestDTO(): string
    {
        return RequiredSimpleRuleDTO::class;
    }

    public function testFieldValuePassed()
    {
        $this->bindRequestDTO();

        $queryString = 'field=value';

        $response = $this->makeResponse($queryString);

        $response->assertOk()
            ->assertJsonPath('meta.status', 'success');
    }

    public function testFieldValueNotPassed()
    {
        $this->bindRequestDTO();

        $response = $this->makeResponse('');

        $response->assertStatus(400)
            ->assertJsonPath('meta.status', 'error')
            ->assertJsonPath('meta.message', 'Validation error')
            ->assertJsonPath('data.field', ['The field field is required.']);
    }

}
