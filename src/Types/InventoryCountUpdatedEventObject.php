<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class InventoryCountUpdatedEventObject extends JsonSerializableType
{
    /**
     * @var ?array<InventoryCount> $inventoryCounts The inventory counts.
     */
    #[JsonProperty('inventory_counts'), ArrayType([InventoryCount::class])]
    private ?array $inventoryCounts;

    /**
     * @param array{
     *   inventoryCounts?: ?array<InventoryCount>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->inventoryCounts = $values['inventoryCounts'] ?? null;
    }

    /**
     * @return ?array<InventoryCount>
     */
    public function getInventoryCounts(): ?array
    {
        return $this->inventoryCounts;
    }

    /**
     * @param ?array<InventoryCount> $value
     */
    public function setInventoryCounts(?array $value = null): self
    {
        $this->inventoryCounts = $value;
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
