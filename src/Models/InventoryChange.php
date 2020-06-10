<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Represents a single physical count, inventory, adjustment, or transfer
 * that is part of the history of inventory changes for a particular
 * `CatalogObject`.
 */
class InventoryChange implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $type;

    /**
     * @var InventoryPhysicalCount|null
     */
    private $physicalCount;

    /**
     * @var InventoryAdjustment|null
     */
    private $adjustment;

    /**
     * @var InventoryTransfer|null
     */
    private $transfer;

    /**
     * Returns Type.
     *
     * Indicates how the inventory change was applied to a tracked quantity of items.
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Sets Type.
     *
     * Indicates how the inventory change was applied to a tracked quantity of items.
     *
     * @maps type
     */
    public function setType(?string $type): void
    {
        $this->type = $type;
    }

    /**
     * Returns Physical Count.
     *
     * Represents the quantity of an item variation that is physically present
     * at a specific location, verified by a seller or a seller's employee. For example,
     * a physical count might come from an employee counting the item variations on
     * hand or from syncing with an external system.
     */
    public function getPhysicalCount(): ?InventoryPhysicalCount
    {
        return $this->physicalCount;
    }

    /**
     * Sets Physical Count.
     *
     * Represents the quantity of an item variation that is physically present
     * at a specific location, verified by a seller or a seller's employee. For example,
     * a physical count might come from an employee counting the item variations on
     * hand or from syncing with an external system.
     *
     * @maps physical_count
     */
    public function setPhysicalCount(?InventoryPhysicalCount $physicalCount): void
    {
        $this->physicalCount = $physicalCount;
    }

    /**
     * Returns Adjustment.
     *
     * Represents a change in state or quantity of product inventory at a
     * particular time and location.
     */
    public function getAdjustment(): ?InventoryAdjustment
    {
        return $this->adjustment;
    }

    /**
     * Sets Adjustment.
     *
     * Represents a change in state or quantity of product inventory at a
     * particular time and location.
     *
     * @maps adjustment
     */
    public function setAdjustment(?InventoryAdjustment $adjustment): void
    {
        $this->adjustment = $adjustment;
    }

    /**
     * Returns Transfer.
     *
     * Represents the transfer of a quantity of product inventory at a
     * particular time from one location to another.
     */
    public function getTransfer(): ?InventoryTransfer
    {
        return $this->transfer;
    }

    /**
     * Sets Transfer.
     *
     * Represents the transfer of a quantity of product inventory at a
     * particular time from one location to another.
     *
     * @maps transfer
     */
    public function setTransfer(?InventoryTransfer $transfer): void
    {
        $this->transfer = $transfer;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['type']          = $this->type;
        $json['physical_count'] = $this->physicalCount;
        $json['adjustment']    = $this->adjustment;
        $json['transfer']      = $this->transfer;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
