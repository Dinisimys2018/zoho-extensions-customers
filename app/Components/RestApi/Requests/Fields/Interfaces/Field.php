<?php

namespace App\Components\RestApi\Requests\Fields\Interfaces;

abstract class Field
{
    public function __construct(
        protected ?string $name = null,
        protected ?string $sourceName = null,
        protected mixed $default = null,
        protected ?string $prefix = null,
        protected mixed $value = null,
        protected mixed $type = null,
    )
    {
        $this->sourceName = $this->sourceName ?? str($name)->snake();
    }

    public function setName(?string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setPrefix(?string $prefix): self
    {
        $this->prefix = $prefix;
        return $this;
    }

    public function getPrefix(): ?string
    {
        return $this->prefix;
    }

    /**
     * @return mixed
     */
    public function getDefault(): mixed
    {
        return $this->default;
    }

    public function setDefault(mixed $default): self
    {
        $this->default = $default;
        return $this;
    }

    public function getFullName(): string
    {
        return $this->prefix ? $this->prefix . '.' . $this->sourceName : $this->sourceName;
    }

    public function setValue(mixed $value): self
    {
        $this->value = $value;
        return $this;
    }

    public function getValue(): mixed
    {
        return $this->value ?? request($this->getFullName(), $this->getDefault());
    }

    public function setType(mixed $type): self
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getType(): mixed
    {
        return $this->type;
    }


    public function setSourceName(?string $sourceName): self
    {
        $this->sourceName = $sourceName;
        return $this;
    }

    public function getSourceName(): ?string
    {
        return $this->sourceName;
    }
}
