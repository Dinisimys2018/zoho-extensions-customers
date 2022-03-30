<?php

namespace App\Components\RestApi\Response;

/**
 * Список статусов для ответа по API
 */
enum StatusesResponse
{
    case error;
    case success;
}
