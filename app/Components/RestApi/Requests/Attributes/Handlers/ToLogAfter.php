<?php

namespace App\Components\RestApi\Requests\Attributes\Handlers;

use App\Components\RestApi\Requests\Attributes\Handlers\Interfaces\AfterHandlerInterface;
use App\Components\RestApi\Requests\RequestDTO;
use Illuminate\Support\Facades\Log;

#[\Attribute]
class ToLogAfter implements AfterHandlerInterface
{
    public function handleRequest(RequestDTO $requestDTO)
    {
        Log::info("{$requestDTO->getName()} [uri={$requestDTO->getUrl()}]: {$requestDTO->toJson()}");
    }
}
