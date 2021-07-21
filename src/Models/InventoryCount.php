<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Represents Square-estimated quantity of items in a particular state at a
 * particular seller location based on the known history of physical counts and
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
     * @var bool|null
     */
    private $isEstimated;

    /**
     * Returns Catalog Object Id.
     *
     * The Square-generated ID of the
     * [CatalogObject]($m/CatalogObject) being tracked.
     */
    public function getCatalogObjectId(): ?string
    {
        return $this->catalogObjectId;
    }

    /**
     * Sets Catalog Object Id.
     *
     * The Square-generated ID of the
     * [CatalogObject]($m/CatalogObject) being tracked.
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
     * The [type]($m/CatalogObjectType) of the
     * [CatalogObject]($m/CatalogObject) being tracked. Tracking is only
     * supported for the `ITEM_VARIATION` type.
     */
    public function getCatalogObjectType(): ?string
    {
        return $this->catalogObjectType;
    }

    /**
     * Sets Catalog Object Type.
     *
     * The [type]($m/CatalogObjectType) of the
     * [CatalogObject]($m/CatalogObject) being tracked. Tracking is only
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
     * The Square-generated ID of the [Location]($m/Location) where the related
     * quantity of items is being tracked.
     */
    public function getLocationId(): ?string
    {
        return $this->locationId;
    }

    /**
     * Sets Location Id.
     *
     * The Square-generated ID of the [Location]($m/Location) where the related
     * quantity of items is being tracked.
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
     * An RFC 3339-formatted timestamp that indicates when the most recent physical count or adjustment
     * affecting
     * the estimated count is received.
     */
    public function getCalculatedAt(): ?string
    {
        return $this->calculatedAt;
    }

    /**
     * Sets Calculated At.
     *
     * An RFC 3339-formatted timestamp that indicates when the most recent physical count or adjustment
     * affecting
     * the estimated count is received.
     *
     * @maps calculated_at
     */
    public function setCalculatedAt(?string $calculatedAt): void
    {
        $this->calculatedAt = $calculatedAt;
    }

    /**
     * Returns Is Estimated.
     *
     * Whether the inventory count is for composed variation (TRUE) or not (FALSE). If true, the inventory
     * count will not be present in the response of
     * any of these endpoints: [BatchChangeInventory]($e/Inventory/BatchChangeInventory),
     * [BatchRetrieveInventoryChanges]($e/Inventory/BatchRetrieveInventoryChanges),
     * [BatchRetrieveInventoryCounts]($e/Inventory/BatchRetrieveInventoryCounts), and
     * [RetrieveInventoryChanges]($e/Inventory/RetrieveInventoryChanges).
     */
    public function getIsEstimated(): ?bool
    {
        return $this->isEstimated;
    }

    /**
     * Sets Is Estimated.
     *
     * Whether the inventory count is for composed variation (TRUE) or not (FALSE). If true, the inventory
     * count will not be present in the response of
     * any of these endpoints: [BatchChangeInventory]($e/Inventory/BatchChangeInventory),
     * [BatchRetrieveInventoryChanges]($e/Inventory/BatchRetrieveInventoryChanges),
     * [BatchRetrieveInventoryCounts]($e/Inventory/BatchRetrieveInventoryCounts), and
     * [RetrieveInventoryChanges]($e/Inventory/RetrieveInventoryChanges).
     *
     * @maps is_estimated
     */
    public function setIsEstimated(?bool $isEstimated): void
    {
        $this->isEstimated = $isEstimated;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->catalogObjectId)) {
            $json['catalog_object_id']   = $this->catalogObjectId;
        }
        if (isset($this->catalogObjectType)) {
            $json['catalog_object_type'] = $this->catalogObjectType;
        }
        if (isset($this->state)) {
            $json['state']               = $this->state;
        }
        if (isset($this->locationId)) {
            $json['location_id']         = $this->locationId;
        }
        if (isset($this->quantity)) {
            $json['quantity']            = $this->quantity;
        }
        if (isset($this->calculatedAt)) {
            $json['calculated_at']       = $this->calculatedAt;
        }
        if (isset($this->isEstimated)) {
            $json['is_estimated']        = $this->isEstimated;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
