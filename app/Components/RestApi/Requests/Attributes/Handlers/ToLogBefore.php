<?php

namespace App\Components\RestApi\Requests\Attributes\Handlers;

use App\Components\RestApi\Requests\Attributes\Handlers\Interfaces\BeforeHandlerInterface;
use App\Components\RestApi\Requests\RequestDTO;
use Illuminate\Support\Facades\Log;

#[\Attribute]
class ToLogBefore implements BeforeHandlerInterface
{
    public function handleRequest(RequestDTO $requestDTO)
    {
        Log::info("{$requestDTO->getName()} \n [uri={$requestDTO->getUrl()}]:\n " . json_encode(request()->all()));

    }
}
