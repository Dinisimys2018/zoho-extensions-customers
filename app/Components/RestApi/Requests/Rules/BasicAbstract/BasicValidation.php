<?php

namespace App\Components\RestApi\Requests\Rules\BasicAbstract;

use App\Components\RestApi\Requests\Fields\Interfaces\Field;

abstract class BasicValidation implements RuleInterface
{
    protected Field $field;

    public function getField(): Field
    {
        return $this->field;
    }

    public function setField(Field $field): void
    {
        $this->field = $field;
    }

    public function handle(Field $field): void
    {
        $this->setField($field);

        if (!$this->validate()) {
            $this->fail();
        }
    }

    abstract public function fail(): void;

    abstract public function validate();
}
