<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Defines a sorter used to sort results from [SearchVendors](api-endpoint:Vendors-SearchVendors).
 */
class SearchVendorsRequestSort extends JsonSerializableType
{
    /**
     * Specifies the sort key to sort the returned vendors.
     * See [Field](#type-field) for possible values
     *
     * @var ?value-of<SearchVendorsRequestSortField> $field
     */
    #[JsonProperty('field')]
    private ?string $field;

    /**
     * Specifies the sort order for the returned vendors.
     * See [SortOrder](#type-sortorder) for possible values
     *
     * @var ?value-of<SortOrder> $order
     */
    #[JsonProperty('order')]
    private ?string $order;

    /**
     * @param array{
     *   field?: ?value-of<SearchVendorsRequestSortField>,
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
     * @return ?value-of<SearchVendorsRequestSortField>
     */
    public function getField(): ?string
    {
        return $this->field;
    }

    /**
     * @param ?value-of<SearchVendorsRequestSortField> $value
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
