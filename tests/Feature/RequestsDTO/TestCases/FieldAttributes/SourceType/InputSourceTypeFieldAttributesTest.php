<?php

namespace Feature\RequestsDTO\TestCases\FieldAttributes\SourceType;

use Tests\Feature\RequestsDTO\RequestsObjects\FieldAttributes\SourceType\InputSourceTypeFieldAttributesDTO;
use Tests\Feature\RequestsDTO\TestCases\Basic;

class InputSourceTypeFieldAttributesTest extends Basic
{
    protected function getRequestDTO(): string
    {
        return InputSourceTypeFieldAttributesDTO::class;
    }

    public function testPassFieldViaQueryString()
    {
        $response = $this->makeResponse('field=test');

        $response->assertOk()
            ->assertJsonPath('meta.status', 'success');
    }

    public function testPassErrorNameViaQueryString()
    {
        $response = $this->makeResponse('error_name=test');

        $response->assertStatus(400)
            ->assertJsonPath('meta.status', 'error')
            ->assertJsonPath('meta.message', 'Validation error')
            ->assertJsonPath('data.field', ['The field field is required.']);
    }
}
