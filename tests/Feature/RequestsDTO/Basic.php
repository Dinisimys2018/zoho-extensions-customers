<?php

namespace Tests\Feature\RequestsDTO;

use App\Components\RestApi\Requests\RequestDTO;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Testing\TestResponse;
use Tests\TestCase;

abstract class Basic extends TestCase
{
    use WithFaker;
    use DatabaseTransactions;

    const PREFIX_PATH = 'requests-dto-test';

    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function getUrl(string $query = ''): string
    {
        return self::PREFIX_PATH . "?$query";
    }

    protected function makeResponse(string $query = ''): TestResponse
    {
        return $this->{$this->getHTTPMethod()}($this->getUrl($query));
    }

    protected function bindRequestDTO()
    {
        app()->bind(RequestDTO::class, function() {
            return $this->getRequestDTO()::createFromRequest();
        });
    }

    abstract protected function getHTTPMethod(): string;

    abstract protected function getRequestDTO(): string;

}
