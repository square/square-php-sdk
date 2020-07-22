<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Represents Square's estimated quantity of items in a particular state at a
 * particular location based on the known history of physical counts and
 * inventory adjustments.
 */
class InventoryCount implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $catalogObjectId;

    /**
     * @var string|null
     */
    private $catalogObjectType;

    /**
     * @var string|null
     */
    private $state;

    /**
     * @var string|null
     */
    private $locationId;

    /**
     * @var string|null
     */
    private $quantity;

    /**
     * @var string|null
     */
    private $calculatedAt;

    /**
     * Returns Catalog Object Id.
     *
     * The Square generated ID of the
     * `CatalogObject` being tracked.
     */
    public function getCatalogObjectId(): ?string
    {
        return $this->catalogObjectId;
    }

    /**
     * Sets Catalog Object Id.
     *
     * The Square generated ID of the
     * `CatalogObject` being tracked.
     *
     * @maps catalog_object_id
     */
    public function setCatalogObjectId(?string $catalogObjectId): void
    {
        $this->catalogObjectId = $catalogObjectId;
    }

    /**
     * Returns Catalog Object Type.
     *
     * The `CatalogObjectType` of the
     * `CatalogObject` being tracked. Tracking is only
     * supported for the `ITEM_VARIATION` type.
     */
    public function getCatalogObjectType(): ?string
    {
        return $this->catalogObjectType;
    }

    /**
     * Sets Catalog Object Type.
     *
     * The `CatalogObjectType` of the
     * `CatalogObject` being tracked. Tracking is only
     * supported for the `ITEM_VARIATION` type.
     *
     * @maps catalog_object_type
     */
    public function setCatalogObjectType(?string $catalogObjectType): void
    {
        $this->catalogObjectType = $catalogObjectType;
    }

    /**
     * Returns State.
     *
     * Indicates the state of a tracked item quantity in the lifecycle of goods.
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * Sets State.
     *
     * Indicates the state of a tracked item quantity in the lifecycle of goods.
     *
     * @maps state
     */
    public function setState(?string $state): void
    {
        $this->state = $state;
    }

    /**
     * Returns Location Id.
     *
     * The Square ID of the [Location](#type-location) where the related
     * quantity of items are being tracked.
     */
    public function getLocationId(): ?string
    {
        return $this->locationId;
    }

    /**
     * Sets Location Id.
     *
     * The Square ID of the [Location](#type-location) where the related
     * quantity of items are being tracked.
     *
     * @maps location_id
     */
    public function setLocationId(?string $locationId): void
    {
        $this->locationId = $locationId;
    }

    /**
     * Returns Quantity.
     *
     * The number of items affected by the estimated count as a decimal string.
     * Can support up to 5 digits after the decimal point.
     */
    public function getQuantity(): ?string
    {
        return $this->quantity;
    }

    /**
     * Sets Quantity.
     *
     * The number of items affected by the estimated count as a decimal string.
     * Can support up to 5 digits after the decimal point.
     *
     * @maps quantity
     */
    public function setQuantity(?string $quantity): void
    {
        $this->quantity = $quantity;
    }

    /**
     * Returns Calculated At.
     *
     * A read-only timestamp in RFC 3339 format that indicates when Square
     * received the most recent physical count or adjustment that had an affect
     * on the estimated count.
     */
    public function getCalculatedAt(): ?string
    {
        return $this->calculatedAt;
    }

    /**
     * Sets Calculated At.
     *
     * A read-only timestamp in RFC 3339 format that indicates when Square
     * received the most recent physical count or adjustment that had an affect
     * on the estimated count.
     *
     * @maps calculated_at
     */
    public function setCalculatedAt(?string $calculatedAt): void
    {
        $this->calculatedAt = $calculatedAt;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['catalog_object_id'] = $this->catalogObjectId;
        $json['catalog_object_type'] = $this->catalogObjectType;
        $json['state']             = $this->state;
        $json['location_id']       = $this->locationId;
        $json['quantity']          = $this->quantity;
        $json['calculated_at']     = $this->calculatedAt;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
