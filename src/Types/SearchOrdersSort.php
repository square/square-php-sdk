<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Sorting criteria for a `SearchOrders` request. Results can only be sorted
 * by a timestamp field.
 */
class SearchOrdersSort extends JsonSerializableType
{
    /**
     * The field to sort by.
     *
     * __Important:__ When using a [DateTimeFilter](entity:SearchOrdersFilter),
     * `sort_field` must match the timestamp field that the `DateTimeFilter` uses to
     * filter. For example, if you set your `sort_field` to `CLOSED_AT` and you use a
     * `DateTimeFilter`, your `DateTimeFilter` must filter for orders by their `CLOSED_AT` date.
     * If this field does not match the timestamp field in `DateTimeFilter`,
     * `SearchOrders` returns an error.
     *
     * Default: `CREATED_AT`.
     * See [SearchOrdersSortField](#type-searchorderssortfield) for possible values
     *
     * @var value-of<SearchOrdersSortField> $sortField
     */
    #[JsonProperty('sort_field')]
    private string $sortField;

    /**
     * The chronological order in which results are returned. Defaults to `DESC`.
     * See [SortOrder](#type-sortorder) for possible values
     *
     * @var ?value-of<SortOrder> $sortOrder
     */
    #[JsonProperty('sort_order')]
    private ?string $sortOrder;

    /**
     * @param array{
     *   sortField: value-of<SearchOrdersSortField>,
     *   sortOrder?: ?value-of<SortOrder>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->sortField = $values['sortField'];
        $this->sortOrder = $values['sortOrder'] ?? null;
    }

    /**
     * @return value-of<SearchOrdersSortField>
     */
    public function getSortField(): string
    {
        return $this->sortField;
    }

    /**
     * @param value-of<SearchOrdersSortField> $value
     */
    public function setSortField(string $value): self
    {
        $this->sortField = $value;
        return $this;
    }

    /**
     * @return ?value-of<SortOrder>
     */
    public function getSortOrder(): ?string
    {
        return $this->sortOrder;
    }

    /**
     * @param ?value-of<SortOrder> $value
     */
    public function setSortOrder(?string $value = null): self
    {
        $this->sortOrder = $value;
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
