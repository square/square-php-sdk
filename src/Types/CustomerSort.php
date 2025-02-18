<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents the sorting criteria in a [search query](entity:CustomerQuery) that defines how to sort
 * customer profiles returned in [SearchCustomers](api-endpoint:Customers-SearchCustomers) results.
 */
class CustomerSort extends JsonSerializableType
{
    /**
     * Indicates the fields to use as the sort key, which is either the default set of fields or `created_at`.
     *
     * The default value is `DEFAULT`.
     * See [CustomerSortField](#type-customersortfield) for possible values
     *
     * @var ?value-of<CustomerSortField> $field
     */
    #[JsonProperty('field')]
    private ?string $field;

    /**
     * Indicates the order in which results should be sorted based on the
     * sort field value. Strings use standard alphabetic comparison
     * to determine order. Strings representing numbers are sorted as strings.
     *
     * The default value is `ASC`.
     * See [SortOrder](#type-sortorder) for possible values
     *
     * @var ?value-of<SortOrder> $order
     */
    #[JsonProperty('order')]
    private ?string $order;

    /**
     * @param array{
     *   field?: ?value-of<CustomerSortField>,
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
     * @return ?value-of<CustomerSortField>
     */
    public function getField(): ?string
    {
        return $this->field;
    }

    /**
     * @param ?value-of<CustomerSortField> $value
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
