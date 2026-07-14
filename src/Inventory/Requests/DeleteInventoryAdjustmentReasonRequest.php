<?php

namespace Square\Inventory\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\InventoryAdjustmentReasonId;
use Square\Core\Json\JsonProperty;

class DeleteInventoryAdjustmentReasonRequest extends JsonSerializableType
{
    /**
     * @var InventoryAdjustmentReasonId $reasonId The identifier of the custom inventory adjustment reason to soft delete.
     */
    #[JsonProperty('reason_id')]
    private InventoryAdjustmentReasonId $reasonId;

    /**
     * @param array{
     *   reasonId: InventoryAdjustmentReasonId,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->reasonId = $values['reasonId'];
    }

    /**
     * @return InventoryAdjustmentReasonId
     */
    public function getReasonId(): InventoryAdjustmentReasonId
    {
        return $this->reasonId;
    }

    /**
     * @param InventoryAdjustmentReasonId $value
     */
    public function setReasonId(InventoryAdjustmentReasonId $value): self
    {
        $this->reasonId = $value;
        $this->_setField('reasonId');
        return $this;
    }
}
