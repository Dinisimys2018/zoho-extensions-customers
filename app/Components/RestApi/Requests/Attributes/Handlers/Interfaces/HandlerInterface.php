<?php

namespace App\Components\RestApi\Requests\Attributes\Handlers\Interfaces;

use App\Components\RestApi\Requests\RequestDTO;

interface HandlerInterface
{
    public function handleRequest(RequestDTO $requestDTO);
}
