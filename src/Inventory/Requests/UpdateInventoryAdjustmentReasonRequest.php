<?php

namespace Square\Inventory\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\InventoryAdjustmentReasonId;
use Square\Core\Json\JsonProperty;
use Square\Types\InventoryAdjustmentReason;

class UpdateInventoryAdjustmentReasonRequest extends JsonSerializableType
{
    /**
     * @var InventoryAdjustmentReasonId $reasonId The identifier of the custom inventory adjustment reason to update.
     */
    #[JsonProperty('reason_id')]
    private InventoryAdjustmentReasonId $reasonId;

    /**
     * The requested custom inventory adjustment reason update. Only the
     * `name` field can be updated. Deleted custom reasons cannot be updated. To
     * restore a deleted custom reason, call
     * [RestoreInventoryAdjustmentReason](api-endpoint:Inventory-RestoreInventoryAdjustmentReason).
     *
     * @var InventoryAdjustmentReason $adjustmentReason
     */
    #[JsonProperty('adjustment_reason')]
    private InventoryAdjustmentReason $adjustmentReason;

    /**
     * @param array{
     *   reasonId: InventoryAdjustmentReasonId,
     *   adjustmentReason: InventoryAdjustmentReason,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->reasonId = $values['reasonId'];
        $this->adjustmentReason = $values['adjustmentReason'];
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

    /**
     * @return InventoryAdjustmentReason
     */
    public function getAdjustmentReason(): InventoryAdjustmentReason
    {
        return $this->adjustmentReason;
    }

    /**
     * @param InventoryAdjustmentReason $value
     */
    public function setAdjustmentReason(InventoryAdjustmentReason $value): self
    {
        $this->adjustmentReason = $value;
        $this->_setField('adjustmentReason');
        return $this;
    }
}
