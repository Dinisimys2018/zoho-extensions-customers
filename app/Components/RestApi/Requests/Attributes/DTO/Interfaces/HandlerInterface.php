<?php

namespace App\Components\RestApi\Requests\Attributes\DTO\Interfaces;

use App\Components\RestApi\Requests\RequestDTO;

interface HandlerInterface
{
    public function handleRequest(RequestDTO $requestDTO): void;
}
