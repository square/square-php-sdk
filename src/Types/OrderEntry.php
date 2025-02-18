<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * A lightweight description of an [order](entity:Order) that is returned when
 * `returned_entries` is `true` on a [SearchOrdersRequest](api-endpoint:Orders-SearchOrders).
 */
class OrderEntry extends JsonSerializableType
{
    /**
     * @var ?string $orderId The ID of the order.
     */
    #[JsonProperty('order_id')]
    private ?string $orderId;

    /**
     * The version number, which is incremented each time an update is committed to the order.
     * Orders that were not created through the API do not include a version number and
     * therefore cannot be updated.
     *
     * [Read more about working with versions.](https://developer.squareup.com/docs/orders-api/manage-orders/update-orders)
     *
     * @var ?int $version
     */
    #[JsonProperty('version')]
    private ?int $version;

    /**
     * @var ?string $locationId The location ID the order belongs to.
     */
    #[JsonProperty('location_id')]
    private ?string $locationId;

    /**
     * @param array{
     *   orderId?: ?string,
     *   version?: ?int,
     *   locationId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->orderId = $values['orderId'] ?? null;
        $this->version = $values['version'] ?? null;
        $this->locationId = $values['locationId'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getOrderId(): ?string
    {
        return $this->orderId;
    }

    /**
     * @param ?string $value
     */
    public function setOrderId(?string $value = null): self
    {
        $this->orderId = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getVersion(): ?int
    {
        return $this->version;
    }

    /**
     * @param ?int $value
     */
    public function setVersion(?int $value = null): self
    {
        $this->version = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getLocationId(): ?string
    {
        return $this->locationId;
    }

    /**
     * @param ?string $value
     */
    public function setLocationId(?string $value = null): self
    {
        $this->locationId = $value;
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
