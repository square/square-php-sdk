<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class OrderCreatedEventData extends JsonSerializableType
{
    /**
     * @var ?string $type Name of the affected object’s type, `"order_created"`.
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?string $id ID of the affected order.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?OrderCreatedObject $object An object containing information about the created Order.
     */
    #[JsonProperty('object')]
    private ?OrderCreatedObject $object;

    /**
     * @param array{
     *   type?: ?string,
     *   id?: ?string,
     *   object?: ?OrderCreatedObject,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->object = $values['object'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?string $value
     */
    public function setType(?string $value = null): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param ?string $value
     */
    public function setId(?string $value = null): self
    {
        $this->id = $value;
        return $this;
    }

    /**
     * @return ?OrderCreatedObject
     */
    public function getObject(): ?OrderCreatedObject
    {
        return $this->object;
    }

    /**
     * @param ?OrderCreatedObject $value
     */
    public function setObject(?OrderCreatedObject $value = null): self
    {
        $this->object = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
