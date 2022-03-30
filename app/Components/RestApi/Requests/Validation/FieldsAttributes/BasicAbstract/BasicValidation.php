<?php

namespace App\Components\RestApi\Requests\Validation\FieldsAttributes\BasicAbstract;

abstract class BasicValidation implements Validated
{
    protected string $field;

    protected mixed $value;

    /**
     * @return string
     */
    public function getField(): string
    {
        return $this->field;
    }

    /**
     * @return mixed
     */
    public function getValue(): mixed
    {
        return $this->value;
    }

    /**
     * @param string $field
     */
    public function setField(string $field): void
    {
        $this->field = $field;
    }

    /**
     * @param mixed $value
     */
    public function setValue(mixed $value): void
    {
        $this->value = $value;
    }

    public function handle(string $field, mixed $value): void
    {
        $this->setField($field);
        $this->setValue($value);

        if (!$this->validate()) {
            $this->fail();
        }
    }

    abstract public function fail(): void;

    abstract public function validate();
}
