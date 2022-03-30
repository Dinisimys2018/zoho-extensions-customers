<?php

namespace App\Components\RestApi\Requests\Reflections;

use App\Components\RestApi\Requests\Attributes\DisableParentAttributes;
use App\Components\RestApi\Requests\Attributes\Handlers\Interfaces\HandlerInterface;
use \ReflectionProperty;
use \ReflectionClass;

class ReflectionRequestDTO
{
    private ReflectionClass $refClass;

    /**
     * @var HandlerInterface[]
     */
    private array $handlers = [];

    /**
     * @var ReflectionProperty[]
     */
    private array $fields = [];

    public function __construct($class)
    {
        $this->refClass = new ReflectionClass($class);
    }

    /**
     * @return ReflectionProperty[]
     */
    public function getFields(): array
    {
        if (!empty($this->fields)) {
            return $this->fields;
        }

        foreach ($this->refClass->getProperties(ReflectionProperty::IS_PUBLIC) as $refProperty) {
            $this->fields[$refProperty->getName()] = $refProperty;
        }
        return $this->fields;
    }

    public function getHandlers(): array
    {
        if (!empty($this->handlers)) {
            return $this->handlers;
        }

        $enabledParent = empty($this->refClass->getAttributes(DisableParentAttributes::class));

        foreach ($this->refClass->getAttributes() as $refAttribute) {
            $attribute = $refAttribute->newInstance();
            if($attribute instanceof HandlerInterface) {
                $this->handlers[$refAttribute->getName()] = $attribute;
            }
        }

        $parentClass = $this->refClass->getParentClass();
        if ($parentClass && $enabledParent) {
            $refRequestParentClass = new self($parentClass->getName());
            $this->handlers = array_merge($this->handlers, $refRequestParentClass->getHandlers());
        }

        return $this->handlers;
    }
}
