<?php

namespace App\Components\RestApi\Response;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\JsonResponse;

class ExceptionWithResponse extends \Exception implements Responsable
{

    public function __construct(private JsonResponse $response)
    {
        parent::__construct();
    }


    public function toResponse($request)
    {
        return $this->response;
    }


    public function report(): bool
    {
        return true;
    }
}
