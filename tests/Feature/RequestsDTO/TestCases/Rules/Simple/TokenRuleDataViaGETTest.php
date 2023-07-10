<?php

namespace Feature\RequestsDTO\TestCases\Rules\Simple;

use Tests\Feature\RequestsDTO\TestCases\Basic;
use Tests\Feature\RequestsDTO\RequestsObjects\Rules\Simple\TokenSimpleRuleDTO;

class TokenRuleDataViaGETTest extends Basic
{
    protected function getRequestDTO(): string
    {
        return TokenSimpleRuleDTO::class;
    }

    public function testValidTokenRule()
    {
        $queryString = 'token=' . config('zoho.tokens.market');

        $response = $this->makeResponse($queryString);

        $response->assertOk()
            ->assertJsonPath('meta.status', 'success');
    }

    public function testInvalidTokenRule()
    {
        $response = $this->makeResponse('');

        $response->assertUnauthorized()
            ->assertJsonPath('meta.message', 'Unauthorized');
    }

}
