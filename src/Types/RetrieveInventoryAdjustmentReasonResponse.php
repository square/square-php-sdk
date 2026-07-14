<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Represents an output from a call to [RetrieveInventoryAdjustmentReason](api-endpoint:Inventory-RetrieveInventoryAdjustmentReason).
 */
class RetrieveInventoryAdjustmentReasonResponse extends JsonSerializableType
{
    /**
     * @var ?array<Error> $errors Errors encountered when the request fails.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * The successfully retrieved inventory adjustment reason. Deleted custom
     * reasons can be retrieved by ID and have `is_deleted` set to `true`.
     *
     * @var ?InventoryAdjustmentReason $adjustmentReason
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
