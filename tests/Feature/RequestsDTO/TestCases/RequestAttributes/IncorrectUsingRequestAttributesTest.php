<?php

namespace Feature\RequestsDTO\TestCases\RequestAttributes;

use Tests\Feature\RequestsDTO\RequestsObjects\RequestAttributes\IncorrectUsingRequestAttributesDTO;
use Tests\Feature\RequestsDTO\TestCases\Basic;

class IncorrectUsingRequestAttributesTest extends Basic
{
    protected function getRequestDTO(): string
    {
        return IncorrectUsingRequestAttributesDTO::class;
    }

    /**
     * @return mixed
     */
    public function testUsingRequestAttributeAsFieldAttribute()
    {
        $this->expectException(\Error::class);
        $response = $this->makeResponse('');
        $response->assertStatus(500);

        throw $response->exception;
    }
}
