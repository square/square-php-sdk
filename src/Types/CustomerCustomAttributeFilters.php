<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * The custom attribute filters in a set of [customer filters](entity:CustomerFilter) used in a search query. Use this filter
 * to search based on [custom attributes](entity:CustomAttribute) that are assigned to customer profiles. For more information, see
 * [Search by custom attribute](https://developer.squareup.com/docs/customers-api/use-the-api/search-customers#search-by-custom-attribute).
 */
class CustomerCustomAttributeFilters extends JsonSerializableType
{
    /**
     * The custom attribute filters. Each filter must specify `key` and include the `filter` field with a type-specific filter,
     * the `updated_at` field, or both. The provided keys must be unique within the list of custom attribute filters.
     *
     * @var ?array<CustomerCustomAttributeFilter> $filters
     */
    #[JsonProperty('filters'), ArrayType([CustomerCustomAttributeFilter::class])]
    private ?array $filters;

    /**
     * @param array{
     *   filters?: ?array<CustomerCustomAttributeFilter>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->filters = $values['filters'] ?? null;
    }

    /**
     * @return ?array<CustomerCustomAttributeFilter>
     */
    public function getFilters(): ?array
    {
        return $this->filters;
    }

    /**
     * @param ?array<CustomerCustomAttributeFilter> $value
     */
    public function setFilters(?array $value = null): self
    {
        $this->filters = $value;
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
