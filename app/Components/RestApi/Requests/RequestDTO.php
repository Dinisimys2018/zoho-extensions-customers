<?php

namespace App\Components\RestApi\Requests;

use App\Components\RestApi\Requests\Attributes\Handlers\Interfaces\AfterHandlerInterface;
use App\Components\RestApi\Requests\Attributes\Handlers\Interfaces\BeforeHandlerInterface;
use App\Components\RestApi\Requests\Reflections\ReflectionRequestDTO;
use App\Components\RestApi\Requests\Validation\FieldsAttributes\BasicAbstract\Validated;
use App\Components\RestApi\Requests\Validation\ValidationErrorsContainer;
use App\Components\RestApi\Response\JsonResponse;
use Illuminate\Support\Facades\Log;

/**
 * TODO: добавить события
 */
abstract class RequestDTO
{
    private bool $validate = true;

    /**
     * Подготовленные данные после всех обработчиков
     * для дальнейшей записи в свойства объекта RequestDTO
     * @var array
     */
    private array $data = [];

    private array $fieldsNames = [];

    private ReflectionRequestDTO $reflectionRequestDTO;

    protected function __construct()
    {
        $this->init();
    }

    public static function createFromRequest(): static
    {
        $dto = static::create();
        $dto->handle();
        return $dto;
    }

    public static function create(): static
    {
        return new static();
    }

    public function handle(): void
    {
        $this->init();

        $this->beforeHandle();

        $this->handleData();

        $this->checkValidationErrors();

        $this->fill();

        $this->afterHandle();
    }

    protected function init()
    {
        $this->reflectionRequestDTO = new ReflectionRequestDTO(static::class);
        $this->getFieldsNames();

    }

    /**
     * @param bool $validate
     */
    public function setValidate(bool $validate): void
    {
        $this->validate = $validate;
    }

    private function handleData()
    {
        foreach ($this->reflectionRequestDTO->getFields() as $fieldName => $field) {

            $refAttributes = $field->getAttributes();

            $value = request($fieldName, $field->getDefaultValue());

            foreach ($refAttributes as $refAttribute) {
                $attribute = $refAttribute->newInstance();
                if ($this->validate && $attribute instanceof Validated) {
                    $attribute->handle($fieldName, $value);
                }
            }

            $this->data[$fieldName] = $value;
        }
    }

    private function beforeHandle()
    {
        $this->handleAttributes(BeforeHandlerInterface::class);
    }

    private function afterHandle()
    {
        $this->handleAttributes(AfterHandlerInterface::class);
    }

    private function handleAttributes(string $interface)
    {
        foreach ($this->reflectionRequestDTO->getHandlers() as $instanceAttribute) {
            if($instanceAttribute instanceof $interface) {
                $instanceAttribute->handleRequest($this);
            }
        }
    }

    private function fill()
    {
        foreach ($this->data as $fieldName => $fieldValue) {
            $this->$fieldName = $fieldValue;
        }
        $this->data = [];
    }

    public function toArray(): array
    {
        $result = [];
        foreach ($this->fieldsNames as $fieldName) {
            $result[$fieldName] = $this->$fieldName;
        }
        return $result;
    }

    public function toJson(): string
    {
        return json_encode($this->toArray());
    }

    public function __toString(): string
    {
        return $this->toJson();
    }

    public function getName(): string
    {
        return static::class;
    }

    public function getUrl(): string
    {
        return request()->url();
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function checkValidationErrors(): void
    {
        $validationErrors = app(ValidationErrorsContainer::class)->getErrors();

        if (!empty($validationErrors)) {
            Log::info(json_encode($this->getData()) .PHP_EOL. json_encode($validationErrors));
            app(JsonResponse::class)->throw()->validationError($validationErrors);
        }
    }


    public function getFieldsNames(): array
    {
        if (!empty($this->fieldsNames)) {
            return $this->fieldsNames;
        }

        foreach ($this->reflectionRequestDTO->getFields() as $fieldName => $property) {
            $this->fieldsNames[] = $fieldName;
        }

        return $this->fieldsNames;
    }


    public function getQuery(): string
    {
        $query = [];
        foreach ($this->getFieldsNames() as $fieldName) {
            if (isset($this->$fieldName)) {
                $query[] = $fieldName . '=' . $this->$fieldName;
            }
        }
        return implode('&', $query);
    }
}
