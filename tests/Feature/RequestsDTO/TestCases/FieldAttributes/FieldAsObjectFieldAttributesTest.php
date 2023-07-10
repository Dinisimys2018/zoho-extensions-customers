<?php

namespace Feature\RequestsDTO\TestCases\FieldAttributes;

use Tests\Feature\RequestsDTO\RequestsObjects\FieldAttributes\FieldAsObject\ParentFieldAsObjectFieldAttributesDTO;
use Tests\Feature\RequestsDTO\TestCases\Basic;

class FieldAsObjectFieldAttributesTest extends Basic
{
    protected function getRequestDTO(): string
    {
        return ParentFieldAsObjectFieldAttributesDTO::class;
    }

    public function testPassFieldAsObject()
    {
        $response = $this->makeResponse('field_as_object[child_field]=test');

        $response->assertOk()
            ->assertJsonPath('meta.status', 'success');
    }

    public function testNotPassFieldAsObject()
    {
        $response = $this->makeResponse('');

        $response->assertStatus(400)
            ->assertJsonPath('meta.status', 'error')
            ->assertJsonPath('meta.message', 'Validation error')
            ->assertJsonPath(
                'data',
                ['field_as_object.child_field' => ['The field_as_object.child_field field is required.']]
            );
    }

}
