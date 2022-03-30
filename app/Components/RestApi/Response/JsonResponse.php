<?php

namespace App\Components\RestApi\Response;

use \Illuminate\Http\JsonResponse as LaravelJsonResponse;

/**
 * Класс для формирования HTTP ответа в формате json
 */
class JsonResponse
{
    /**
     * @var StatusesResponse Статус ответа
     */
    protected StatusesResponse $status;

    /**
     * @var array Основные данные с результатом
     */
    protected array $data = [];

    /**
     * @var array Meta-данные
     */
    protected array $meta = [];

    /**
     * @var int HTTP-код ответа
     */
    protected int $httpCode = 200;

    protected bool $throw = false;

    /**
     * Формирует и возвращает ответ в формате json
     * @return LaravelJsonResponse
     */
    private function response(): LaravelJsonResponse
    {
        $json = [];

        $additionalMeta = [
            'status' => $this->status->name,
        ];
        $json['meta'] = array_merge($additionalMeta, $this->meta);

        if (!empty($this->data)) {
            $json['data'] = $this->data;
        }

        $response = response()->json($json, $this->httpCode);
        if ($this->throw) {
            throw new ExceptionWithResponse($response);
        }
        return $response;
    }

    /**
     * Устанавливает статус ответа для успешного запроса
     * @return $this
     */
    public function setStatusSuccess(): self
    {
        $this->status = StatusesResponse::success;
        return $this;
    }

    /**
     * Устанавливает статус ответа для ошибки
     * @return $this
     */
    public function setStatusError(): self
    {
        $this->status = StatusesResponse::error;
        return $this;
    }

    /**
     * Устанавливает HTTP-code
     * @param int $code
     * @return $this
     */
    public function setHttpCode(int $code): self
    {
        $this->httpCode = $code;
        return $this;
    }

    /**
     * Добавляет в meta-данные сообщение
     * @param string $message
     * @return $this
     */
    public function setMessage(string $message): self
    {
        $this->meta['message'] = $message;
        return $this;
    }

    /**
     * Ответ в случае, если запрос не прошел авторизацию
     * @return LaravelJsonResponse
     */
    public function unauthorized(): LaravelJsonResponse
    {
        return $this->setStatusError()
            ->setHttpCode(401)
            ->setMessage('Unauthorized')
            ->response();
    }

    /**
     * Ответ с успешным статусом, но без данных
     * @return LaravelJsonResponse
     */
    public function emptySuccess(): LaravelJsonResponse
    {
        return $this->setStatusSuccess()
            ->response();
    }


    public function validationError(array $messages)
    {
        $this->data = $messages;
        return $this->setStatusError()
            ->setHttpCode(400)
            ->setMessage('Validation error')
            ->response();
    }

    public function throw()
    {
        $this->throw = true;
        return $this;
    }
}
