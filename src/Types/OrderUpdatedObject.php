<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class OrderUpdatedObject extends JsonSerializableType
{
    /**
     * @var ?OrderUpdated $orderUpdated Information about the updated order.
     */
    #[JsonProperty('order_updated')]
    private ?OrderUpdated $orderUpdated;

    /**
     * @param array{
     *   orderUpdated?: ?OrderUpdated,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->orderUpdated = $values['orderUpdated'] ?? null;
    }

    /**
     * @return ?OrderUpdated
     */
    public function getOrderUpdated(): ?OrderUpdated
    {
        return $this->orderUpdated;
    }

    /**
     * @param ?OrderUpdated $value
     */
    public function setOrderUpdated(?OrderUpdated $value = null): self
    {
        $this->orderUpdated = $value;
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
