<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Defines the fields that are included in requests to the
 * BatchRetrieveOrders endpoint.
 */
class BatchRetrieveOrdersRequest implements \JsonSerializable
{
    /**
     * @var string[]
     */
    private $orderIds;

    /**
     * @param string[] $orderIds
     */
    public function __construct(array $orderIds)
    {
        $this->orderIds = $orderIds;
    }

    /**
     * Returns Order Ids.
     *
     * The IDs of the orders to retrieve. A maximum of 100 orders can be retrieved per request.
     *
     * @return string[]
     */
    public function getOrderIds(): array
    {
        return $this->orderIds;
    }

    /**
     * Sets Order Ids.
     *
     * The IDs of the orders to retrieve. A maximum of 100 orders can be retrieved per request.
     *
     * @required
     * @maps order_ids
     *
     * @param string[] $orderIds
     */
    public function setOrderIds(array $orderIds): void
    {
        $this->orderIds = $orderIds;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['order_ids'] = $this->orderIds;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
