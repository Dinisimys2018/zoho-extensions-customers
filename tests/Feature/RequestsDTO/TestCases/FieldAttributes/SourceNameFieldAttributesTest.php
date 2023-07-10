<?php

namespace Feature\RequestsDTO\TestCases\FieldAttributes;

use Tests\Feature\RequestsDTO\RequestsObjects\FieldAttributes\SourceNameFieldAttributesDTO;
use Tests\Feature\RequestsDTO\TestCases\Basic;

class SourceNameFieldAttributesTest extends Basic
{
    protected function getRequestDTO(): string
    {
        return SourceNameFieldAttributesDTO::class;
    }

    public function testPassSourceNameFieldAttribute()
    {
        $response = $this->makeResponse('changeFieldName=test');

        $response->assertOk()
            ->assertJsonPath('meta.status', 'success');
    }

    public function testNotPassSourceNameFieldAttribute()
    {
        $response = $this->makeResponse('error_name=test');

        $response->assertStatus(400)
            ->assertJsonPath('meta.status', 'error')
            ->assertJsonPath('meta.message', 'Validation error')
            ->assertJsonPath('data.changeFieldName', ['The changeFieldName field is required.']);
    }

}
