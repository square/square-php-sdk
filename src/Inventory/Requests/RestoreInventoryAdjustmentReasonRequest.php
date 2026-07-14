<?php

namespace Square\Inventory\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\InventoryAdjustmentReasonId;
use Square\Core\Json\JsonProperty;

class RestoreInventoryAdjustmentReasonRequest extends JsonSerializableType
{
    /**
     * The identifier of the soft-deleted custom inventory adjustment reason
     * to restore.
     *
     * @var InventoryAdjustmentReasonId $reasonId
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
