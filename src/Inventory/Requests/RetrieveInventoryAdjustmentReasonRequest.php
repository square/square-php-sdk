<?php

namespace Square\Inventory\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\InventoryAdjustmentReasonId;
use Square\Core\Json\JsonProperty;

class RetrieveInventoryAdjustmentReasonRequest extends JsonSerializableType
{
    /**
     * @var InventoryAdjustmentReasonId $reasonId The identifier of the inventory adjustment reason to retrieve.
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
