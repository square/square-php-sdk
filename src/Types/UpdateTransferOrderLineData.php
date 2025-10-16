<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents a line item update in a transfer order
 */
class UpdateTransferOrderLineData extends JsonSerializableType
{
    /**
     * @var ?string $uid Line item id being updated. Required for updating/removing existing line items, but should not be set for new line items.
     */
    #[JsonProperty('uid')]
    private ?string $uid;

    /**
     * Catalog item variation being transferred
     *
     * Required for new line items, but otherwise is not updatable.
     *
     * @var ?string $itemVariationId
     */
    #[JsonProperty('item_variation_id')]
    private ?string $itemVariationId;

    /**
     * @var ?string $quantityOrdered Total quantity ordered
     */
    #[JsonProperty('quantity_ordered')]
    private ?string $quantityOrdered;

    /**
     * @var ?bool $remove Flag to remove the line item during update. Must include `uid` in removal request
     */
    #[JsonProperty('remove')]
    private ?bool $remove;

    /**
     * @param array{
     *   uid?: ?string,
     *   itemVariationId?: ?string,
     *   quantityOrdered?: ?string,
     *   remove?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->uid = $values['uid'] ?? null;
        $this->itemVariationId = $values['itemVariationId'] ?? null;
        $this->quantityOrdered = $values['quantityOrdered'] ?? null;
        $this->remove = $values['remove'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getUid(): ?string
    {
        return $this->uid;
    }

    /**
     * @param ?string $value
     */
    public function setUid(?string $value = null): self
    {
        $this->uid = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getItemVariationId(): ?string
    {
        return $this->itemVariationId;
    }

    /**
     * @param ?string $value
     */
    public function setItemVariationId(?string $value = null): self
    {
        $this->itemVariationId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getQuantityOrdered(): ?string
    {
        return $this->quantityOrdered;
    }

    /**
     * @param ?string $value
     */
    public function setQuantityOrdered(?string $value = null): self
    {
        $this->quantityOrdered = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getRemove(): ?bool
    {
        return $this->remove;
    }

    /**
     * @param ?bool $value
     */
    public function setRemove(?bool $value = null): self
    {
        $this->remove = $value;
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
