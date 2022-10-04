<?php

namespace App\Components\RestApi\Requests\Attributes\DTO;

use App\Components\RestApi\Requests\Attributes\DTO\Interfaces\BeforeHandlerInterface;
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
