<?php

namespace App\Components\RestApi\Requests\Attributes\Handlers;

use App\Components\RestApi\Requests\Attributes\Handlers\Interfaces\BeforeHandlerInterface;
use App\Components\RestApi\Requests\RequestDTO;

#[\Attribute]
class NotValidate implements BeforeHandlerInterface
{
    public function handleRequest(RequestDTO $requestDTO)
    {
        $requestDTO->setValidate(false);
    }
}
