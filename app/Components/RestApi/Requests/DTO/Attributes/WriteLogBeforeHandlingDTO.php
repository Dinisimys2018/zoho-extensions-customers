<?php

namespace App\Components\RestApi\Requests\DTO\Attributes;

use App\Components\RestApi\Requests\DTO\Attributes\Interfaces\BeforeHandlerInterface;
use App\Components\RestApi\Requests\RequestDTO;
use Illuminate\Support\Facades\Log;

#[\Attribute]
class WriteLogBeforeHandlingDTO implements BeforeHandlerInterface
{
    public function handleRequest(RequestDTO $requestDTO): void
    {
        Log::info("{$requestDTO->getName()} \n [uri={$requestDTO->getUrl()}]:\n " . json_encode(request()->all()));
    }
}
