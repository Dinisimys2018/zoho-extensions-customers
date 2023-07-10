<?php

namespace Feature\RequestsDTO\TestCases\Rules\Simple;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\RequestsDTO\TestCases\Basic;
use Tests\Feature\RequestsDTO\RequestsObjects\Rules\Simple\ExistsInDBSimpleRuleDTO;

class ExistsInDBRuleDataViaGETTest extends Basic
{
    use RefreshDatabase;

    protected function getRequestDTO(): string
    {
        return ExistsInDBSimpleRuleDTO::class;
    }

    public function testExtensionIsExistsInDatabaseRule()
    {
        $response = $this->makeResponse('extension_id=1');

        $response->assertOk()
            ->assertJsonPath('meta.status', 'success');
    }

    public function testExtensionIsNotExistsInDatabaseRule()
    {
        $response = $this->makeResponse('extension_id=error');

        $response->assertStatus(400)
            ->assertJsonPath('meta.status', 'error')
            ->assertJsonPath('meta.message', 'Validation error')
            ->assertJsonPath('data.extension_id', ['The selected extension_id is invalid.']);
    }

}
