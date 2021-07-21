<?php

declare(strict_types=1);

namespace Square\Models;

class OrderCreatedObject implements \JsonSerializable
{
    /**
     * @var OrderCreated|null
     */
    private $orderCreated;

    /**
     * Returns Order Created.
     */
    public function getOrderCreated(): ?OrderCreated
    {
        return $this->orderCreated;
    }

    /**
     * Sets Order Created.
     *
     * @maps order_created
     */
    public function setOrderCreated(?OrderCreated $orderCreated): void
    {
        $this->orderCreated = $orderCreated;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->orderCreated)) {
            $json['order_created'] = $this->orderCreated;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
