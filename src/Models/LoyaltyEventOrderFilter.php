<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Filter events by the order associated with the event.
 */
class LoyaltyEventOrderFilter implements \JsonSerializable
{
    /**
     * @var string
     */
    private $orderId;

    /**
     * @param string $orderId
     */
    public function __construct(string $orderId)
    {
        $this->orderId = $orderId;
    }

    /**
     * Returns Order Id.
     *
     * The ID of the [order]($m/Order) associated with the event.
     */
    public function getOrderId(): string
    {
        return $this->orderId;
    }

    /**
     * Sets Order Id.
     *
     * The ID of the [order]($m/Order) associated with the event.
     *
     * @required
     * @maps order_id
     */
    public function setOrderId(string $orderId): void
    {
        $this->orderId = $orderId;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['order_id'] = $this->orderId;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
