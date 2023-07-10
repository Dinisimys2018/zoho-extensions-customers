<?php

namespace App\Http\Controllers\RequestsDTO;

use App\Components\RestApi\Requests\RequestDTO;
use App\Components\RestApi\Response\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function __construct(
        private JsonResponse $response,
        private RequestDTO $packageRequestDTO
    ) {
    }

    public function test(Request $request)
    {
        return $this->response->emptySuccess();
    }
}
