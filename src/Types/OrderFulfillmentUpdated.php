<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class OrderFulfillmentUpdated extends JsonSerializableType
{
    /**
     * @var ?string $orderId The order's unique ID.
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
     * @var ?string $locationId The ID of the seller location that this order is associated with.
     */
    #[JsonProperty('location_id')]
    private ?string $locationId;

    /**
     * The state of the order.
     * See [OrderState](#type-orderstate) for possible values
     *
     * @var ?value-of<OrderState> $state
     */
    #[JsonProperty('state')]
    private ?string $state;

    /**
     * @var ?string $createdAt The timestamp for when the order was created, in RFC 3339 format.
     */
    #[JsonProperty('created_at')]
    private ?string $createdAt;

    /**
     * @var ?string $updatedAt The timestamp for when the order was last updated, in RFC 3339 format.
     */
    #[JsonProperty('updated_at')]
    private ?string $updatedAt;

    /**
     * @var ?array<OrderFulfillmentUpdatedUpdate> $fulfillmentUpdate The fulfillments that were updated with this version change.
     */
    #[JsonProperty('fulfillment_update'), ArrayType([OrderFulfillmentUpdatedUpdate::class])]
    private ?array $fulfillmentUpdate;

    /**
     * @param array{
     *   orderId?: ?string,
     *   version?: ?int,
     *   locationId?: ?string,
     *   state?: ?value-of<OrderState>,
     *   createdAt?: ?string,
     *   updatedAt?: ?string,
     *   fulfillmentUpdate?: ?array<OrderFulfillmentUpdatedUpdate>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->orderId = $values['orderId'] ?? null;
        $this->version = $values['version'] ?? null;
        $this->locationId = $values['locationId'] ?? null;
        $this->state = $values['state'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
        $this->fulfillmentUpdate = $values['fulfillmentUpdate'] ?? null;
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
     * @return ?value-of<OrderState>
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * @param ?value-of<OrderState> $value
     */
    public function setState(?string $value = null): self
    {
        $this->state = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    /**
     * @param ?string $value
     */
    public function setCreatedAt(?string $value = null): self
    {
        $this->createdAt = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

    /**
     * @param ?string $value
     */
    public function setUpdatedAt(?string $value = null): self
    {
        $this->updatedAt = $value;
        return $this;
    }

    /**
     * @return ?array<OrderFulfillmentUpdatedUpdate>
     */
    public function getFulfillmentUpdate(): ?array
    {
        return $this->fulfillmentUpdate;
    }

    /**
     * @param ?array<OrderFulfillmentUpdatedUpdate> $value
     */
    public function setFulfillmentUpdate(?array $value = null): self
    {
        $this->fulfillmentUpdate = $value;
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
