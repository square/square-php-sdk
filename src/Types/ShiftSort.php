<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Sets the sort order of search results.
 *
 * Deprecated at Square API version 2025-05-21. See the [migration notes](https://developer.squareup.com/docs/labor-api/what-it-does#migration-notes).
 */
class ShiftSort extends JsonSerializableType
{
    /**
     * The field to sort on.
     * See [ShiftSortField](#type-shiftsortfield) for possible values
     *
     * @var ?value-of<ShiftSortField> $field
     */
    #[JsonProperty('field')]
    private ?string $field;

    /**
     * The order in which results are returned. Defaults to DESC.
     * See [SortOrder](#type-sortorder) for possible values
     *
     * @var ?value-of<SortOrder> $order
     */
    #[JsonProperty('order')]
    private ?string $order;

    /**
     * @param array{
     *   field?: ?value-of<ShiftSortField>,
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
     * @return ?value-of<ShiftSortField>
     */
    public function getField(): ?string
    {
        return $this->field;
    }

    /**
     * @param ?value-of<ShiftSortField> $value
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
