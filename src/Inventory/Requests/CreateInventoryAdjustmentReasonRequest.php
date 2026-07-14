<?php

namespace Square\Inventory\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Types\InventoryAdjustmentReason;

class CreateInventoryAdjustmentReasonRequest extends JsonSerializableType
{
    /**
     * A client-supplied, universally unique identifier to make this
     * [CreateInventoryAdjustmentReason](api-endpoint:Inventory-CreateInventoryAdjustmentReason)
     * request idempotent.
     *
     * @var string $idempotencyKey
     */
    #[JsonProperty('idempotency_key')]
    private string $idempotencyKey;

    /**
     * The custom inventory adjustment reason to create. Only custom
     * adjustment reasons can be created.
     *
     * @var InventoryAdjustmentReason $adjustmentReason
     */
    #[JsonProperty('adjustment_reason')]
    private InventoryAdjustmentReason $adjustmentReason;

    /**
     * @param array{
     *   idempotencyKey: string,
     *   adjustmentReason: InventoryAdjustmentReason,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->idempotencyKey = $values['idempotencyKey'];
        $this->adjustmentReason = $values['adjustmentReason'];
    }

    /**
     * @return string
     */
    public function getIdempotencyKey(): string
    {
        return $this->idempotencyKey;
    }

    /**
     * @param string $value
     */
    public function setIdempotencyKey(string $value): self
    {
        $this->idempotencyKey = $value;
        $this->_setField('idempotencyKey');
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
