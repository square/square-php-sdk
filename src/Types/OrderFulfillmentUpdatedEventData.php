<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class OrderFulfillmentUpdatedEventData extends JsonSerializableType
{
    /**
     * @var ?string $type Name of the affected object’s type, `"order_fulfillment_updated"`.
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?string $id ID of the affected order.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?OrderFulfillmentUpdatedObject $object An object containing information about the updated Order.
     */
    #[JsonProperty('object')]
    private ?OrderFulfillmentUpdatedObject $object;

    /**
     * @param array{
     *   type?: ?string,
     *   id?: ?string,
     *   object?: ?OrderFulfillmentUpdatedObject,
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
     * @return ?OrderFulfillmentUpdatedObject
     */
    public function getObject(): ?OrderFulfillmentUpdatedObject
    {
        return $this->object;
    }

    /**
     * @param ?OrderFulfillmentUpdatedObject $value
     */
    public function setObject(?OrderFulfillmentUpdatedObject $value = null): self
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
