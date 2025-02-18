<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents Square-estimated quantity of items in a particular state at a
 * particular seller location based on the known history of physical counts and
 * inventory adjustments.
 */
class InventoryCount extends JsonSerializableType
{
    /**
     * The Square-generated ID of the
     * [CatalogObject](entity:CatalogObject) being tracked.
     *
     * @var ?string $catalogObjectId
     */
    #[JsonProperty('catalog_object_id')]
    private ?string $catalogObjectId;

    /**
     * The [type](entity:CatalogObjectType) of the [CatalogObject](entity:CatalogObject) being tracked.
     *
     * The Inventory API supports setting and reading the `"catalog_object_type": "ITEM_VARIATION"` field value.
     * In addition, it can also read the `"catalog_object_type": "ITEM"` field value that is set by the Square Restaurants app.
     *
     * @var ?string $catalogObjectType
     */
    #[JsonProperty('catalog_object_type')]
    private ?string $catalogObjectType;

    /**
     * The current [inventory state](entity:InventoryState) for the related
     * quantity of items.
     * See [InventoryState](#type-inventorystate) for possible values
     *
     * @var ?value-of<InventoryState> $state
     */
    #[JsonProperty('state')]
    private ?string $state;

    /**
     * The Square-generated ID of the [Location](entity:Location) where the related
     * quantity of items is being tracked.
     *
     * @var ?string $locationId
     */
    #[JsonProperty('location_id')]
    private ?string $locationId;

    /**
     * The number of items affected by the estimated count as a decimal string.
     * Can support up to 5 digits after the decimal point.
     *
     * @var ?string $quantity
     */
    #[JsonProperty('quantity')]
    private ?string $quantity;

    /**
     * An RFC 3339-formatted timestamp that indicates when the most recent physical count or adjustment affecting
     * the estimated count is received.
     *
     * @var ?string $calculatedAt
     */
    #[JsonProperty('calculated_at')]
    private ?string $calculatedAt;

    /**
     * Whether the inventory count is for composed variation (TRUE) or not (FALSE). If true, the inventory count will not be present in the response of
     * any of these endpoints: [BatchChangeInventory](api-endpoint:Inventory-BatchChangeInventory),
     * [BatchRetrieveInventoryChanges](api-endpoint:Inventory-BatchRetrieveInventoryChanges),
     * [BatchRetrieveInventoryCounts](api-endpoint:Inventory-BatchRetrieveInventoryCounts), and
     * [RetrieveInventoryChanges](api-endpoint:Inventory-RetrieveInventoryChanges).
     *
     * @var ?bool $isEstimated
     */
    #[JsonProperty('is_estimated')]
    private ?bool $isEstimated;

    /**
     * @param array{
     *   catalogObjectId?: ?string,
     *   catalogObjectType?: ?string,
     *   state?: ?value-of<InventoryState>,
     *   locationId?: ?string,
     *   quantity?: ?string,
     *   calculatedAt?: ?string,
     *   isEstimated?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->catalogObjectId = $values['catalogObjectId'] ?? null;
        $this->catalogObjectType = $values['catalogObjectType'] ?? null;
        $this->state = $values['state'] ?? null;
        $this->locationId = $values['locationId'] ?? null;
        $this->quantity = $values['quantity'] ?? null;
        $this->calculatedAt = $values['calculatedAt'] ?? null;
        $this->isEstimated = $values['isEstimated'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getCatalogObjectId(): ?string
    {
        return $this->catalogObjectId;
    }

    /**
     * @param ?string $value
     */
    public function setCatalogObjectId(?string $value = null): self
    {
        $this->catalogObjectId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCatalogObjectType(): ?string
    {
        return $this->catalogObjectType;
    }

    /**
     * @param ?string $value
     */
    public function setCatalogObjectType(?string $value = null): self
    {
        $this->catalogObjectType = $value;
        return $this;
    }

    /**
     * @return ?value-of<InventoryState>
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * @param ?value-of<InventoryState> $value
     */
    public function setState(?string $value = null): self
    {
        $this->state = $value;
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
     * @return ?string
     */
    public function getQuantity(): ?string
    {
        return $this->quantity;
    }

    /**
     * @param ?string $value
     */
    public function setQuantity(?string $value = null): self
    {
        $this->quantity = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCalculatedAt(): ?string
    {
        return $this->calculatedAt;
    }

    /**
     * @param ?string $value
     */
    public function setCalculatedAt(?string $value = null): self
    {
        $this->calculatedAt = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getIsEstimated(): ?bool
    {
        return $this->isEstimated;
    }

    /**
     * @param ?bool $value
     */
    public function setIsEstimated(?bool $value = null): self
    {
        $this->isEstimated = $value;
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
