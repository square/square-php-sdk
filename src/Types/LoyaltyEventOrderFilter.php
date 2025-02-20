<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Filter events by the order associated with the event.
 */
class LoyaltyEventOrderFilter extends JsonSerializableType
{
    /**
     * @var string $orderId The ID of the [order](entity:Order) associated with the event.
     */
    #[JsonProperty('order_id')]
    private string $orderId;

    /**
     * @param array{
     *   orderId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->orderId = $values['orderId'];
    }

    /**
     * @return string
     */
    public function getOrderId(): string
    {
        return $this->orderId;
    }

    /**
     * @param string $value
     */
    public function setOrderId(string $value): self
    {
        $this->orderId = $value;
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
