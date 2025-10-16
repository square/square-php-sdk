<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Sort configuration for search results
 */
class TransferOrderSort extends JsonSerializableType
{
    /**
     * Field to sort by
     * See [TransferOrderSortField](#type-transferordersortfield) for possible values
     *
     * @var ?value-of<TransferOrderSortField> $field
     */
    #[JsonProperty('field')]
    private ?string $field;

    /**
     * Sort order direction
     * See [SortOrder](#type-sortorder) for possible values
     *
     * @var ?value-of<SortOrder> $order
     */
    #[JsonProperty('order')]
    private ?string $order;

    /**
     * @param array{
     *   field?: ?value-of<TransferOrderSortField>,
     *   order?: ?value-of<SortOrder>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->field = $values['field'] ?? null;
        $this->order = $values['order'] ?? null;
    }

    /**
     * @return ?value-of<TransferOrderSortField>
     */
    public function getField(): ?string
    {
        return $this->field;
    }

    /**
     * @param ?value-of<TransferOrderSortField> $value
     */
    public function setField(?string $value = null): self
    {
        $this->field = $value;
        return $this;
    }

    /**
     * @return ?value-of<SortOrder>
     */
    public function getOrder(): ?string
    {
        return $this->order;
    }

    /**
     * @param ?value-of<SortOrder> $value
     */
    public function setOrder(?string $value = null): self
    {
        $this->order = $value;
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
