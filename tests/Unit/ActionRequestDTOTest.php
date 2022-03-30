<?php

namespace Tests\Unit;

use App\Components\Zoho\Market\Requests\ActionRequestDTO;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;

class ActionRequestDTOTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_queryString()
    {
        $request = ActionRequestDTO::create();
        $request->token = $this->getToken();
        $request->companyId = 1;
        $request->extensionId = 2;
        $request->email = 'emailValue';
        $request->zapikey = 'zapikeyValue';
        $this->assertEquals('token=123&companyId=1&extensionId=2&email=emailValue&zapikey=zapikeyValue', $request->getQuery());
    }

    protected function getToken()
    {
        return config('zoho.tokens.market');
    }
}
