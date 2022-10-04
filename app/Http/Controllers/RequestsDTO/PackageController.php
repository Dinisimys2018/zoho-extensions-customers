<?php

namespace App\Http\Controllers\RequestsDTO;

use App\Components\RestApi\Requests\RequestDTO;
use App\Components\RestApi\Response\JsonResponse;
use App\Http\Controllers\Controller;

    class PackageController extends Controller
{
    public function __construct(
        private JsonResponse $response,
        private RequestDTO $packageRequestDTO
    ) {
    }

    public function test()
    {
        return $this->response->emptySuccess();
    }
}
