<?php

declare(strict_types=1);

namespace Square\Models;

class OrderUpdated implements \JsonSerializable
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
     * @var string|null
     */
    private $state;

    /**
     * @var string|null
     */
    private $createdAt;

    /**
     * @var string|null
     */
    private $updatedAt;

    /**
     * Returns Order Id.
     *
     * The order's unique ID.
     */
    public function getOrderId(): ?string
    {
        return $this->orderId;
    }

    /**
     * Sets Order Id.
     *
     * The order's unique ID.
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
     * orders#update-orders)
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
     * orders#update-orders)
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
     * The ID of the merchant location this order is associated with.
     */
    public function getLocationId(): ?string
    {
        return $this->locationId;
    }

    /**
     * Sets Location Id.
     *
     * The ID of the merchant location this order is associated with.
     *
     * @maps location_id
     */
    public function setLocationId(?string $locationId): void
    {
        $this->locationId = $locationId;
    }

    /**
     * Returns State.
     *
     * The state of the order.
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * Sets State.
     *
     * The state of the order.
     *
     * @maps state
     */
    public function setState(?string $state): void
    {
        $this->state = $state;
    }

    /**
     * Returns Created At.
     *
     * Timestamp for when the order was created in RFC 3339 format.
     */
    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    /**
     * Sets Created At.
     *
     * Timestamp for when the order was created in RFC 3339 format.
     *
     * @maps created_at
     */
    public function setCreatedAt(?string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Returns Updated At.
     *
     * Timestamp for when the order was last updated in RFC 3339 format.
     */
    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

    /**
     * Sets Updated At.
     *
     * Timestamp for when the order was last updated in RFC 3339 format.
     *
     * @maps updated_at
     */
    public function setUpdatedAt(?string $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
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
        $json['state']      = $this->state;
        $json['created_at'] = $this->createdAt;
        $json['updated_at'] = $this->updatedAt;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
