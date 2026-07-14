<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Identifies a standard or custom inventory adjustment reason.
 */
class InventoryAdjustmentReasonId extends JsonSerializableType
{
    /**
     * The adjustment reason type.
     * See [Type](#type-type) for possible values
     *
     * @var value-of<InventoryAdjustmentReasonIdType> $type
     */
    #[JsonProperty('type')]
    private string $type;

    /**
     * The Square-generated ID of the custom adjustment reason. This field
     * is only set when `type` is `CUSTOM`.
     *
     * @var ?string $customReasonId
     */
    #[JsonProperty('custom_reason_id')]
    private ?string $customReasonId;

    /**
     * @param array{
     *   type: value-of<InventoryAdjustmentReasonIdType>,
     *   customReasonId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->customReasonId = $values['customReasonId'] ?? null;
    }

    /**
     * @return value-of<InventoryAdjustmentReasonIdType>
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param value-of<InventoryAdjustmentReasonIdType> $value
     */
    public function setType(string $value): self
    {
        $this->type = $value;
        $this->_setField('type');
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCustomReasonId(): ?string
    {
        return $this->customReasonId;
    }

    /**
     * @param ?string $value
     */
    public function setCustomReasonId(?string $value = null): self
    {
        $this->customReasonId = $value;
        $this->_setField('customReasonId');
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
