<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Represents an output from a call to [UpdateInventoryAdjustmentReason](api-endpoint:Inventory-UpdateInventoryAdjustmentReason).
 */
class UpdateInventoryAdjustmentReasonResponse extends JsonSerializableType
{
    /**
     * @var ?array<Error> $errors Errors encountered when the request fails.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @var ?InventoryAdjustmentReason $adjustmentReason The successfully updated inventory adjustment reason.
     */
    #[JsonProperty('adjustment_reason')]
    private ?InventoryAdjustmentReason $adjustmentReason;

    /**
     * @param array{
     *   errors?: ?array<Error>,
     *   adjustmentReason?: ?InventoryAdjustmentReason,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->errors = $values['errors'] ?? null;
        $this->adjustmentReason = $values['adjustmentReason'] ?? null;
    }

    /**
     * @return ?array<Error>
     */
    public function getErrors(): ?array
    {
        return $this->errors;
    }

    /**
     * @param ?array<Error> $value
     */
    public function setErrors(?array $value = null): self
    {
        $this->errors = $value;
        $this->_setField('errors');
        return $this;
    }

    /**
     * @return ?InventoryAdjustmentReason
     */
    public function getAdjustmentReason(): ?InventoryAdjustmentReason
    {
        return $this->adjustmentReason;
    }

    /**
     * @param ?InventoryAdjustmentReason $value
     */
    public function setAdjustmentReason(?InventoryAdjustmentReason $value = null): self
    {
        $this->adjustmentReason = $value;
        $this->_setField('adjustmentReason');
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
