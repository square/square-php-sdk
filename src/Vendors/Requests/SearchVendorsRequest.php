<?php

namespace Square\Vendors\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\SearchVendorsRequestFilter;
use Square\Core\Json\JsonProperty;
use Square\Types\SearchVendorsRequestSort;

class SearchVendorsRequest extends JsonSerializableType
{
    /**
     * @var ?SearchVendorsRequestFilter $filter Specifies a filter used to search for vendors.
     */
    #[JsonProperty('filter')]
    private ?SearchVendorsRequestFilter $filter;

    /**
     * @var ?SearchVendorsRequestSort $sort Specifies a sorter used to sort the returned vendors.
     */
    #[JsonProperty('sort')]
    private ?SearchVendorsRequestSort $sort;

    /**
     * A pagination cursor returned by a previous call to this endpoint.
     * Provide this to retrieve the next set of results for the original query.
     *
     * See the [Pagination](https://developer.squareup.com/docs/working-with-apis/pagination) guide for more information.
     *
     * @var ?string $cursor
     */
    #[JsonProperty('cursor')]
    private ?string $cursor;

    /**
     * @param array{
     *   filter?: ?SearchVendorsRequestFilter,
     *   sort?: ?SearchVendorsRequestSort,
     *   cursor?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->filter = $values['filter'] ?? null;
        $this->sort = $values['sort'] ?? null;
        $this->cursor = $values['cursor'] ?? null;
    }

    /**
     * @return ?SearchVendorsRequestFilter
     */
    public function getFilter(): ?SearchVendorsRequestFilter
    {
        return $this->filter;
    }

    /**
     * @param ?SearchVendorsRequestFilter $value
     */
    public function setFilter(?SearchVendorsRequestFilter $value = null): self
    {
        $this->filter = $value;
        return $this;
    }

    /**
     * @return ?SearchVendorsRequestSort
     */
    public function getSort(): ?SearchVendorsRequestSort
    {
        return $this->sort;
    }

    /**
     * @param ?SearchVendorsRequestSort $value
     */
    public function setSort(?SearchVendorsRequestSort $value = null): self
    {
        $this->sort = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCursor(): ?string
    {
        return $this->cursor;
    }

    /**
     * @param ?string $value
     */
    public function setCursor(?string $value = null): self
    {
        $this->cursor = $value;
        return $this;
    }
}
