<?php

namespace App\Components\RestApi\Requests\DTO\Attributes;

use App\Components\RestApi\Requests\DTO\Attributes\Interfaces\BeforeHandlerInterface;
use App\Components\RestApi\Requests\RequestDTO;

#[\Attribute(\Attribute::TARGET_CLASS)]
class NotValidateDTO implements BeforeHandlerInterface
{
    public function handleRequest(RequestDTO $requestDTO): void
    {
        $requestDTO->setValidate(false);
    }
}
