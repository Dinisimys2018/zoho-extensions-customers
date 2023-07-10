<?php

namespace Feature\RequestsDTO\TestCases\FieldAttributes\SourceType;

use Tests\Feature\RequestsDTO\RequestsObjects\FieldAttributes\SourceType\JSONSourceTypeFieldAttributesDTO;
use Tests\Feature\RequestsDTO\TestCases\Basic;

class JSONSourceTypeFieldAttributesTest extends Basic
{
    protected function getRequestDTO(): string
    {
        return JSONSourceTypeFieldAttributesDTO::class;
    }

    public function testPassFieldViaJson()
    {
        $response = $this->makeResponseWithJSON(['field' => 'test']);

        $response->assertOk()
            ->assertJsonPath('meta.status', 'success');
    }

    public function testPassFieldNotViaJson()
    {
        $response = $this->makeResponse('field=test');

        $response->assertStatus(400)
            ->assertJsonPath('meta.status', 'error')
            ->assertJsonPath('meta.message', 'Validation error')
            ->assertJsonPath('data.field', ['The field field is required.']);
    }
}
