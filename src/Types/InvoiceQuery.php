<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Describes query criteria for searching invoices.
 */
class InvoiceQuery extends JsonSerializableType
{
    /**
     * Query filters to apply in searching invoices.
     * For more information, see [Search for invoices](https://developer.squareup.com/docs/invoices-api/retrieve-list-search-invoices#search-invoices).
     *
     * @var InvoiceFilter $filter
     */
    #[JsonProperty('filter')]
    private InvoiceFilter $filter;

    /**
     * @var ?InvoiceSort $sort Describes the sort order for the search result.
     */
    #[JsonProperty('sort')]
    private ?InvoiceSort $sort;

    /**
     * @param array{
     *   filter: InvoiceFilter,
     *   sort?: ?InvoiceSort,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->filter = $values['filter'];
        $this->sort = $values['sort'] ?? null;
    }

    /**
     * @return InvoiceFilter
     */
    public function getFilter(): InvoiceFilter
    {
        return $this->filter;
    }

    /**
     * @param InvoiceFilter $value
     */
    public function setFilter(InvoiceFilter $value): self
    {
        $this->filter = $value;
        return $this;
    }

    /**
     * @return ?InvoiceSort
     */
    public function getSort(): ?InvoiceSort
    {
        return $this->sort;
    }

    /**
     * @param ?InvoiceSort $value
     */
    public function setSort(?InvoiceSort $value = null): self
    {
        $this->sort = $value;
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
