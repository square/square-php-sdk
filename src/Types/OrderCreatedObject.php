<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class OrderCreatedObject extends JsonSerializableType
{
    /**
     * @var ?OrderCreated $orderCreated Information about the created order.
     */
    #[JsonProperty('order_created')]
    private ?OrderCreated $orderCreated;

    /**
     * @param array{
     *   orderCreated?: ?OrderCreated,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->orderCreated = $values['orderCreated'] ?? null;
    }

    /**
     * @return ?OrderCreated
     */
    public function getOrderCreated(): ?OrderCreated
    {
        return $this->orderCreated;
    }

    /**
     * @param ?OrderCreated $value
     */
    public function setOrderCreated(?OrderCreated $value = null): self
    {
        $this->orderCreated = $value;
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
