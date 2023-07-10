<?php

namespace Feature\RequestsDTO\TestCases\RequestAttributes;

use Tests\Feature\RequestsDTO\TestCases\Basic;
use Tests\Feature\RequestsDTO\RequestsObjects\RequestAttributes\NotValidateRequestAttributesDTO;

class NotValidateRequestTest extends Basic
{
    protected function getRequestDTO(): string
    {
        return NotValidateRequestAttributesDTO::class;
    }

    public function testNotValidateRequest()
    {
        $response = $this->makeResponse('');

        $response->assertOk()
            ->assertJsonPath('meta.status', 'success');
    }
}
