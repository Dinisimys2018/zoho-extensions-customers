<?php

namespace Tests\Feature\RequestsDTO\TestCases\CreatingDTO;

use App\Components\RestApi\Requests\RequestDTO;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Request;
use Illuminate\Testing\TestResponse;
use Tests\TestCase;

abstract class Basic extends TestCase
{
    use DatabaseTransactions;

    protected function setUp(): void
    {
        parent::setUp();
        $this->bindRequest();
    }

    protected function bindRequest()
    {
        app()->bind('request', function() {
            return $this->getRequest();
        });
    }

    abstract protected function getRequest(): Request;

}
