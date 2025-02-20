<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\CatalogMeasurementUnit;
use Square\Legacy\Models\InventoryAdjustment;
use Square\Legacy\Models\InventoryChange;
use Square\Legacy\Models\InventoryPhysicalCount;
use Square\Legacy\Models\InventoryTransfer;

/**
 * Builder for model InventoryChange
 *
 * @see InventoryChange
 */
class InventoryChangeBuilder
{
    /**
     * @var InventoryChange
     */
    private $instance;

    private function __construct(InventoryChange $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Inventory Change Builder object.
     */
    public static function init(): self
    {
        return new self(new InventoryChange());
    }

    /**
     * Sets type field.
     *
     * @param string|null $value
     */
    public function type(?string $value): self
    {
        $this->instance->setType($value);
        return $this;
    }

    /**
     * Sets physical count field.
     *
     * @param InventoryPhysicalCount|null $value
     */
    public function physicalCount(?InventoryPhysicalCount $value): self
    {
        $this->instance->setPhysicalCount($value);
        return $this;
    }

    /**
     * Sets adjustment field.
     *
     * @param InventoryAdjustment|null $value
     */
    public function adjustment(?InventoryAdjustment $value): self
    {
        $this->instance->setAdjustment($value);
        return $this;
    }

    /**
     * Sets transfer field.
     *
     * @param InventoryTransfer|null $value
     */
    public function transfer(?InventoryTransfer $value): self
    {
        $this->instance->setTransfer($value);
        return $this;
    }

    /**
     * Sets measurement unit field.
     *
     * @param CatalogMeasurementUnit|null $value
     */
    public function measurementUnit(?CatalogMeasurementUnit $value): self
    {
        $this->instance->setMeasurementUnit($value);
        return $this;
    }

    /**
     * Sets measurement unit id field.
     *
     * @param string|null $value
     */
    public function measurementUnitId(?string $value): self
    {
        $this->instance->setMeasurementUnitId($value);
        return $this;
    }

    /**
     * Initializes a new Inventory Change object.
     */
    public function build(): InventoryChange
    {
        return CoreHelper::clone($this->instance);
    }
}
