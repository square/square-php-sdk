<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Identifies the sort field and sort order.
 */
class InvoiceSort extends JsonSerializableType
{
    /**
     * The field to use for sorting.
     * See [InvoiceSortField](#type-invoicesortfield) for possible values
     *
     * @var 'INVOICE_SORT_DATE' $field
     */
    #[JsonProperty('field')]
    private string $field;

    /**
     * The order to use for sorting the results.
     * See [SortOrder](#type-sortorder) for possible values
     *
     * @var ?value-of<SortOrder> $order
     */
    #[JsonProperty('order')]
    private ?string $order;

    /**
     * @param array{
     *   field: 'INVOICE_SORT_DATE',
     *   order?: ?value-of<SortOrder>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->field = $values['field'];
        $this->order = $values['order'] ?? null;
    }

    /**
     * @return 'INVOICE_SORT_DATE'
     */
    public function getField(): string
    {
        return $this->field;
    }

    /**
     * @param 'INVOICE_SORT_DATE' $value
     */
    public function setField(string $value): self
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
