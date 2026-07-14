<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Represents an output from a call to [ListInventoryAdjustmentReasons](api-endpoint:Inventory-ListInventoryAdjustmentReasons).
 */
class ListInventoryAdjustmentReasonsResponse extends JsonSerializableType
{
    /**
     * @var ?array<Error> $errors Errors encountered when the request fails.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * The standard, system-generated, and custom inventory adjustment
     * reasons available to the seller.
     *
     * @var ?array<InventoryAdjustmentReason> $adjustmentReasons
     */
    #[JsonProperty('adjustment_reasons'), ArrayType([InventoryAdjustmentReason::class])]
    private ?array $adjustmentReasons;

    /**
     * @param array{
     *   errors?: ?array<Error>,
     *   adjustmentReasons?: ?array<InventoryAdjustmentReason>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->errors = $values['errors'] ?? null;
        $this->adjustmentReasons = $values['adjustmentReasons'] ?? null;
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
     * @return ?array<InventoryAdjustmentReason>
     */
    public function getAdjustmentReasons(): ?array
    {
        return $this->adjustmentReasons;
    }

    /**
     * @param ?array<InventoryAdjustmentReason> $value
     */
    public function setAdjustmentReasons(?array $value = null): self
    {
        $this->adjustmentReasons = $value;
        $this->_setField('adjustmentReasons');
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
