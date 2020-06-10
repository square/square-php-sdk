<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * A lightweight description of an [Order](#type-order) that is returned when `returned_entries` is
 * true on a
 * [SearchOrderRequest](#type-searchorderrequest)
 */
class OrderEntry implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $orderId;

    /**
     * @var int|null
     */
    private $version;

    /**
     * @var string|null
     */
    private $locationId;

    /**
     * Returns Order Id.
     *
     * The id of the Order
     */
    public function getOrderId(): ?string
    {
        return $this->orderId;
    }

    /**
     * Sets Order Id.
     *
     * The id of the Order
     *
     * @maps order_id
     */
    public function setOrderId(?string $orderId): void
    {
        $this->orderId = $orderId;
    }

    /**
     * Returns Version.
     *
     * Version number which is incremented each time an update is committed to the order.
     * Orders that were not created through the API will not include a version and
     * thus cannot be updated.
     *
     * [Read more about working with versions](https://developer.squareup.com/docs/orders-api/manage-
     * orders#update-orders).
     */
    public function getVersion(): ?int
    {
        return $this->version;
    }

    /**
     * Sets Version.
     *
     * Version number which is incremented each time an update is committed to the order.
     * Orders that were not created through the API will not include a version and
     * thus cannot be updated.
     *
     * [Read more about working with versions](https://developer.squareup.com/docs/orders-api/manage-
     * orders#update-orders).
     *
     * @maps version
     */
    public function setVersion(?int $version): void
    {
        $this->version = $version;
    }

    /**
     * Returns Location Id.
     *
     * The location id the Order belongs to.
     */
    public function getLocationId(): ?string
    {
        return $this->locationId;
    }

    /**
     * Sets Location Id.
     *
     * The location id the Order belongs to.
     *
     * @maps location_id
     */
    public function setLocationId(?string $locationId): void
    {
        $this->locationId = $locationId;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['order_id']   = $this->orderId;
        $json['version']    = $this->version;
        $json['location_id'] = $this->locationId;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
