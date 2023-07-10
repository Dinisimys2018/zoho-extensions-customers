<?php

namespace Feature\RequestsDTO\TestCases\FieldAttributes;

use Tests\Feature\RequestsDTO\RequestsObjects\FieldAttributes\ArrayOfObjects\ParentArrayOfObjectsFieldAttributesDTO;
use Tests\Feature\RequestsDTO\TestCases\Basic;

class ArrayOfObjectsFieldAttributesTest extends Basic
{
    protected function getRequestDTO(): string
    {
        return ParentArrayOfObjectsFieldAttributesDTO::class;
    }

    public function testPassArrayOfObjects()
    {
        $response = $this->makeResponseWithJSON([
            'array_of_objects' => [
                ['child_field' => 1],
                ['child_field' => 2]
            ]
        ]);

        $response->assertOk()
            ->assertJsonPath('meta.status', 'success');
    }

    public function testNotPassArrayOfObjects()
    {
        $response = $this->makeResponse('');

        $response->assertStatus(400)
            ->assertJsonPath('meta.status', 'error')
            ->assertJsonPath('meta.message', 'Validation error')
            ->assertJsonPath('data.array_of_objects', ['The array_of_objects field is required.']);
    }

    public function testPassEmptyArrayOfObjects()
    {
        $response = $this->makeResponseWithJSON([
            'array_of_objects' => []
        ]);

        $response->assertStatus(400)
            ->assertJsonPath('meta.status', 'error')
            ->assertJsonPath('meta.message', 'Validation error')
            ->assertJsonPath('data.array_of_objects', ['The array_of_objects field is required.']);
    }

    public function testPassListOfNumbersInsteadOfArrayOfObjects()
    {
        $response = $this->makeResponseWithJSON([
            'array_of_objects' => [1,2]
        ]);

        $response->assertStatus(400)
            ->assertJsonPath('meta.status', 'error')
            ->assertJsonPath('meta.message', 'Validation error')
            ->assertJsonPath('data', [
                'array_of_objects.0.child_field' => ['The array_of_objects.0.child_field field is required.'],
                'array_of_objects.1.child_field' => ['The array_of_objects.1.child_field field is required.']
            ]);
    }

    public function testPassNotValidObjectsInArrayOfObjects()
    {
        $response = $this->makeResponseWithJSON([
            'array_of_objects' => [
                ['error_name' => 1],
                ['error_name' => 2],
            ]
        ]);

        $response->assertStatus(400)
            ->assertJsonPath('meta.status', 'error')
            ->assertJsonPath('meta.message', 'Validation error')
            ->assertJsonPath('data', [
                'array_of_objects.0.child_field' => ['The array_of_objects.0.child_field field is required.'],
                'array_of_objects.1.child_field' => ['The array_of_objects.1.child_field field is required.']
            ]);
    }


    public function testPassOneValidObjectInArrayOfObjects()
    {
        $response = $this->makeResponseWithJSON([
            'array_of_objects' => [
                ['child_field' => 1], //valid
                ['error_name' => 2], //not valid
            ]
        ]);

        $response->assertStatus(400)
            ->assertJsonPath('meta.status', 'error')
            ->assertJsonPath('meta.message', 'Validation error')
            ->assertJsonPath('data', [
                'array_of_objects.1.child_field' => ['The array_of_objects.1.child_field field is required.']
            ]);
    }
}
