<?php

namespace Tests\Feature\Zoho\Market\Hooks\Basic;

use App\Components\Zoho\Market\Requests\ActionRequestDTO;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\Factory\RequestsDTO\ActionRequestsDTOFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Testing\TestResponse;
use Tests\TestCase;

class HookBasic extends TestCase
{
    use WithFaker;
    use DatabaseTransactions;

    protected const PREFIX_PATH = 'api/zoho/market';

    protected string $action;

    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function getUrl(string $query): string
    {
        return self::PREFIX_PATH . '/' . $this->action . "?$query";
    }

    protected function makeResponse($queryString): TestResponse
    {
        return $this->get($this->getUrl($queryString));
    }

    protected function getToken()
    {
        return config('zoho.tokens.market');
    }


    public function test_success()
    {
        $queryString = 'token=' . $this->getToken() . '&';
        $queryString .= 'companyId=1&';
        $queryString .= 'extensionId=1&'; //need set real extensionId exists in DB
        $queryString .= 'email=' . $this->faker->email;
        $queryString .=  'zapikey=' . Str::random();
        $response = $this->makeResponse($queryString);

        $response->assertOk()
            ->assertJsonPath('meta.status', 'success');
    }

    public function test_unauthorized()
    {
        $queryString = 'token=' . $this->getToken() . '_fake&';
        $queryString .= 'companyId=1&';
        $queryString .= 'extensionId=1&'; //need set real extensionId exists in DB
        $queryString .= 'email=' . $this->faker->email;
        $queryString .=  'zapikey=' . Str::random();
        $response = $this->makeResponse($queryString);

        $response->assertUnauthorized()
            ->assertJsonPath('meta.status', 'error')
            ->assertJsonPath('meta.message', 'Unauthorized');
    }

    public function test_not_exists_extension()
    {
        $queryString = 'token=' . $this->getToken() . '&';
        $queryString .= 'companyId=1&';
        $queryString .= 'extensionId=1333333333334&'; //need set extensionId NOT exists in DB
        $queryString .= 'email=' . $this->faker->email;
        $queryString .=  'zapikey=' . Str::random();
        $response = $this->makeResponse($queryString);

        $response->assertStatus(400)
            ->assertJsonPath('meta.status', 'error')
            ->assertJsonPath('meta.message', 'Validation error');
    }
}
