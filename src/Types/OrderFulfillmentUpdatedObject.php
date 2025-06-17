<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class OrderFulfillmentUpdatedObject extends JsonSerializableType
{
    /**
     * @var ?OrderFulfillmentUpdated $orderFulfillmentUpdated Information about the updated order fulfillment.
     */
    #[JsonProperty('order_fulfillment_updated')]
    private ?OrderFulfillmentUpdated $orderFulfillmentUpdated;

    /**
     * @param array{
     *   orderFulfillmentUpdated?: ?OrderFulfillmentUpdated,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->orderFulfillmentUpdated = $values['orderFulfillmentUpdated'] ?? null;
    }

    /**
     * @return ?OrderFulfillmentUpdated
     */
    public function getOrderFulfillmentUpdated(): ?OrderFulfillmentUpdated
    {
        return $this->orderFulfillmentUpdated;
    }

    /**
     * @param ?OrderFulfillmentUpdated $value
     */
    public function setOrderFulfillmentUpdated(?OrderFulfillmentUpdated $value = null): self
    {
        $this->orderFulfillmentUpdated = $value;
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
