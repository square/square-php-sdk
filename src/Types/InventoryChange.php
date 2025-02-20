<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents a single physical count, inventory, adjustment, or transfer
 * that is part of the history of inventory changes for a particular
 * [CatalogObject](entity:CatalogObject) instance.
 */
class InventoryChange extends JsonSerializableType
{
    /**
     * Indicates how the inventory change is applied. See
     * [InventoryChangeType](entity:InventoryChangeType) for all possible values.
     * See [InventoryChangeType](#type-inventorychangetype) for possible values
     *
     * @var ?value-of<InventoryChangeType> $type
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * Contains details about the physical count when `type` is
     * `PHYSICAL_COUNT`, and is unset for all other change types.
     *
     * @var ?InventoryPhysicalCount $physicalCount
     */
    #[JsonProperty('physical_count')]
    private ?InventoryPhysicalCount $physicalCount;

    /**
     * Contains details about the inventory adjustment when `type` is
     * `ADJUSTMENT`, and is unset for all other change types.
     *
     * @var ?InventoryAdjustment $adjustment
     */
    #[JsonProperty('adjustment')]
    private ?InventoryAdjustment $adjustment;

    /**
     * Contains details about the inventory transfer when `type` is
     * `TRANSFER`, and is unset for all other change types.
     *
     * _Note:_ An [InventoryTransfer](entity:InventoryTransfer) object can only be set in the input to the
     * [BatchChangeInventory](api-endpoint:Inventory-BatchChangeInventory) endpoint when the seller has an active Retail Plus subscription.
     *
     * @var ?InventoryTransfer $transfer
     */
    #[JsonProperty('transfer')]
    private ?InventoryTransfer $transfer;

    /**
     * @var ?CatalogMeasurementUnit $measurementUnit The [CatalogMeasurementUnit](entity:CatalogMeasurementUnit) object representing the catalog measurement unit associated with the inventory change.
     */
    #[JsonProperty('measurement_unit')]
    private ?CatalogMeasurementUnit $measurementUnit;

    /**
     * @var ?string $measurementUnitId The ID of the [CatalogMeasurementUnit](entity:CatalogMeasurementUnit) object representing the catalog measurement unit associated with the inventory change.
     */
    #[JsonProperty('measurement_unit_id')]
    private ?string $measurementUnitId;

    /**
     * @param array{
     *   type?: ?value-of<InventoryChangeType>,
     *   physicalCount?: ?InventoryPhysicalCount,
     *   adjustment?: ?InventoryAdjustment,
     *   transfer?: ?InventoryTransfer,
     *   measurementUnit?: ?CatalogMeasurementUnit,
     *   measurementUnitId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->type = $values['type'] ?? null;
        $this->physicalCount = $values['physicalCount'] ?? null;
        $this->adjustment = $values['adjustment'] ?? null;
        $this->transfer = $values['transfer'] ?? null;
        $this->measurementUnit = $values['measurementUnit'] ?? null;
        $this->measurementUnitId = $values['measurementUnitId'] ?? null;
    }

    /**
     * @return ?value-of<InventoryChangeType>
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?value-of<InventoryChangeType> $value
     */
    public function setType(?string $value = null): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return ?InventoryPhysicalCount
     */
    public function getPhysicalCount(): ?InventoryPhysicalCount
    {
        return $this->physicalCount;
    }

    /**
     * @param ?InventoryPhysicalCount $value
     */
    public function setPhysicalCount(?InventoryPhysicalCount $value = null): self
    {
        $this->physicalCount = $value;
        return $this;
    }

    /**
     * @return ?InventoryAdjustment
     */
    public function getAdjustment(): ?InventoryAdjustment
    {
        return $this->adjustment;
    }

    /**
     * @param ?InventoryAdjustment $value
     */
    public function setAdjustment(?InventoryAdjustment $value = null): self
    {
        $this->adjustment = $value;
        return $this;
    }

    /**
     * @return ?InventoryTransfer
     */
    public function getTransfer(): ?InventoryTransfer
    {
        return $this->transfer;
    }

    /**
     * @param ?InventoryTransfer $value
     */
    public function setTransfer(?InventoryTransfer $value = null): self
    {
        $this->transfer = $value;
        return $this;
    }

    /**
     * @return ?CatalogMeasurementUnit
     */
    public function getMeasurementUnit(): ?CatalogMeasurementUnit
    {
        return $this->measurementUnit;
    }

    /**
     * @param ?CatalogMeasurementUnit $value
     */
    public function setMeasurementUnit(?CatalogMeasurementUnit $value = null): self
    {
        $this->measurementUnit = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getMeasurementUnitId(): ?string
    {
        return $this->measurementUnitId;
    }

    /**
     * @param ?string $value
     */
    public function setMeasurementUnitId(?string $value = null): self
    {
        $this->measurementUnitId = $value;
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
