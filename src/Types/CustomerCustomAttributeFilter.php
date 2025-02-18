<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * The custom attribute filter. Use this filter in a set of [custom attribute filters](entity:CustomerCustomAttributeFilters) to search
 * based on the value or last updated date of a customer-related [custom attribute](entity:CustomAttribute).
 */
class CustomerCustomAttributeFilter extends JsonSerializableType
{
    /**
     * The `key` of the [custom attribute](entity:CustomAttribute) to filter by. The key is the identifier of the custom attribute
     * (and the corresponding custom attribute definition) and can be retrieved using the [Customer Custom Attributes API](api:CustomerCustomAttributes).
     *
     * @var string $key
     */
    #[JsonProperty('key')]
    private string $key;

    /**
     * A filter that corresponds to the data type of the target custom attribute. For example, provide the `phone` filter to
     * search based on the value of a `PhoneNumber`-type custom attribute. The data type is specified by the schema field of the custom attribute definition,
     * which can be retrieved using the [Customer Custom Attributes API](api:CustomerCustomAttributes).
     *
     * You must provide this `filter` field, the `updated_at` field, or both.
     *
     * @var ?CustomerCustomAttributeFilterValue $filter
     */
    #[JsonProperty('filter')]
    private ?CustomerCustomAttributeFilterValue $filter;

    /**
     * The date range for when the custom attribute was last updated. The date range can include `start_at`, `end_at`, or
     * both. Range boundaries are inclusive. Dates are specified as RFC 3339 timestamps.
     *
     * You must provide this `updated_at` field, the `filter` field, or both.
     *
     * @var ?TimeRange $updatedAt
     */
    #[JsonProperty('updated_at')]
    private ?TimeRange $updatedAt;

    /**
     * @param array{
     *   key: string,
     *   filter?: ?CustomerCustomAttributeFilterValue,
     *   updatedAt?: ?TimeRange,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->key = $values['key'];
        $this->filter = $values['filter'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
    }

    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * @param string $value
     */
    public function setKey(string $value): self
    {
        $this->key = $value;
        return $this;
    }

    /**
     * @return ?CustomerCustomAttributeFilterValue
     */
    public function getFilter(): ?CustomerCustomAttributeFilterValue
    {
        return $this->filter;
    }

    /**
     * @param ?CustomerCustomAttributeFilterValue $value
     */
    public function setFilter(?CustomerCustomAttributeFilterValue $value = null): self
    {
        $this->filter = $value;
        return $this;
    }

    /**
     * @return ?TimeRange
     */
    public function getUpdatedAt(): ?TimeRange
    {
        return $this->updatedAt;
    }

    /**
     * @param ?TimeRange $value
     */
    public function setUpdatedAt(?TimeRange $value = null): self
    {
        $this->updatedAt = $value;
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
