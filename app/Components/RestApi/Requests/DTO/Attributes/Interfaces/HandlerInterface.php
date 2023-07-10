<?php

namespace App\Components\RestApi\Requests\DTO\Attributes\Interfaces;

use App\Components\RestApi\Requests\RequestDTO;

interface HandlerInterface
{
    public function handleRequest(RequestDTO $requestDTO): void;
}
