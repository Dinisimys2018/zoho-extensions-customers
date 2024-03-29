<?php

namespace App\Components\RestApi\Requests\DTO\Attributes;

use App\Components\RestApi\Requests\DTO\Attributes\Interfaces\AfterHandlerInterface;
use App\Components\RestApi\Requests\RequestDTO;
use Illuminate\Support\Facades\Log;

#[\Attribute]
class WriteLogAfterHandlingDTO implements AfterHandlerInterface
{
    public function handleRequest(RequestDTO $requestDTO): void
    {
        Log::info("{$requestDTO->getName()} [uri={$requestDTO->getUrl()}]: {$requestDTO->toJson()}");
    }
}
