<?php

namespace App\Components\RestApi\Requests\Attributes\DTO;

use App\Components\RestApi\Requests\Attributes\DTO\Interfaces\BeforeHandlerInterface;
use App\Components\RestApi\Requests\RequestDTO;

#[\Attribute]
class NotValidateDTO implements BeforeHandlerInterface
{
    public function handleRequest(RequestDTO $requestDTO): void
    {
        $requestDTO->setValidate(false);
    }
}
