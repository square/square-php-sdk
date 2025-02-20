<?php

namespace Square\Inventory\Requests;

use Square\Core\Json\JsonSerializableType;

class GetAdjustmentInventoryRequest extends JsonSerializableType
{
    /**
     * @var string $adjustmentId ID of the [InventoryAdjustment](entity:InventoryAdjustment) to retrieve.
     */
    private string $adjustmentId;

    /**
     * @param array{
     *   adjustmentId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->adjustmentId = $values['adjustmentId'];
    }

    /**
     * @return string
     */
    public function getAdjustmentId(): string
    {
        return $this->adjustmentId;
    }

    /**
     * @param string $value
     */
    public function setAdjustmentId(string $value): self
    {
        $this->adjustmentId = $value;
        return $this;
    }
}
