<?php

namespace App\Components\RestApi\Requests\Fields\Attributes\SourceTypes;

enum SourceTypesEnum: string
{
    case JSON = 'json';
    case INPUT = 'input';
}
