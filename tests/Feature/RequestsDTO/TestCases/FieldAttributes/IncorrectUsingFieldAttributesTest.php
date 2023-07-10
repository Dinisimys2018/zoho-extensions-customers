<?php

namespace Feature\RequestsDTO\TestCases\FieldAttributes;

use Tests\Feature\RequestsDTO\RequestsObjects\FieldAttributes\IncorrectUsingFieldAttributesDTO;
use Tests\Feature\RequestsDTO\TestCases\Basic;

class IncorrectUsingFieldAttributesTest extends Basic
{
    protected function getRequestDTO(): string
    {
        return IncorrectUsingFieldAttributesDTO::class;
    }

    public function testUsingFieldAttributeAsClassAttribute()
    {
        $this->expectException(\Error::class);
        $response = $this->makeResponse('changeFieldName=test');
        $response->assertStatus(500);

        throw $response->exception;
    }

}
