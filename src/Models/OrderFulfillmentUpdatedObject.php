<?php

declare(strict_types=1);

namespace Square\Models;

class OrderFulfillmentUpdatedObject implements \JsonSerializable
{
    /**
     * @var OrderFulfillmentUpdated|null
     */
    private $orderFulfillmentUpdated;

    /**
     * Returns Order Fulfillment Updated.
     */
    public function getOrderFulfillmentUpdated(): ?OrderFulfillmentUpdated
    {
        return $this->orderFulfillmentUpdated;
    }

    /**
     * Sets Order Fulfillment Updated.
     *
     * @maps order_fulfillment_updated
     */
    public function setOrderFulfillmentUpdated(?OrderFulfillmentUpdated $orderFulfillmentUpdated): void
    {
        $this->orderFulfillmentUpdated = $orderFulfillmentUpdated;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->orderFulfillmentUpdated)) {
            $json['order_fulfillment_updated'] = $this->orderFulfillmentUpdated;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
