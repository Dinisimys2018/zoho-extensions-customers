<?php

namespace App\Components\RestApi\Requests\Validation;

/**
 * Bind as singleton in service provider
 */
class ValidationErrorsContainer
{
    private array $errors = [];

    public function put(string $key, string $message)
    {
        if(!key_exists($key, $this->errors)) {
            $this->errors[$key] = [];
        }
        $this->errors[$key][] = $message;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

}
