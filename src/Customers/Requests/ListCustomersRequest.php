<?php

namespace Square\Customers\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\CustomerSortField;
use Square\Types\SortOrder;

class ListCustomersRequest extends JsonSerializableType
{
    /**
     * A pagination cursor returned by a previous call to this endpoint.
     * Provide this cursor to retrieve the next set of results for your original query.
     *
     * For more information, see [Pagination](https://developer.squareup.com/docs/build-basics/common-api-patterns/pagination).
     *
     * @var ?string $cursor
     */
    private ?string $cursor;

    /**
     * The maximum number of results to return in a single page. This limit is advisory. The response might contain more or fewer results.
     * If the specified limit is less than 1 or greater than 100, Square returns a `400 VALUE_TOO_LOW` or `400 VALUE_TOO_HIGH` error. The default value is 100.
     *
     * For more information, see [Pagination](https://developer.squareup.com/docs/build-basics/common-api-patterns/pagination).
     *
     * @var ?int $limit
     */
    private ?int $limit;

    /**
     * Indicates how customers should be sorted.
     *
     * The default value is `DEFAULT`.
     *
     * @var ?value-of<CustomerSortField> $sortField
     */
    private ?string $sortField;

    /**
     * Indicates whether customers should be sorted in ascending (`ASC`) or
     * descending (`DESC`) order.
     *
     * The default value is `ASC`.
     *
     * @var ?value-of<SortOrder> $sortOrder
     */
    private ?string $sortOrder;

    /**
     * Indicates whether to return the total count of customers in the `count` field of the response.
     *
     * The default value is `false`.
     *
     * @var ?bool $count
     */
    private ?bool $count;

    /**
     * @param array{
     *   cursor?: ?string,
     *   limit?: ?int,
     *   sortField?: ?value-of<CustomerSortField>,
     *   sortOrder?: ?value-of<SortOrder>,
     *   count?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->cursor = $values['cursor'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->sortField = $values['sortField'] ?? null;
        $this->sortOrder = $values['sortOrder'] ?? null;
        $this->count = $values['count'] ?? null;
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

    /**
     * @return ?int
     */
    public function getLimit(): ?int
    {
        return $this->limit;
    }

    /**
     * @param ?int $value
     */
    public function setLimit(?int $value = null): self
    {
        $this->limit = $value;
        return $this;
    }

    /**
     * @return ?value-of<CustomerSortField>
     */
    public function getSortField(): ?string
    {
        return $this->sortField;
    }

    /**
     * @param ?value-of<CustomerSortField> $value
     */
    public function setSortField(?string $value = null): self
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
     * @return ?bool
     */
    public function getCount(): ?bool
    {
        return $this->count;
    }

    /**
     * @param ?bool $value
     */
    public function setCount(?bool $value = null): self
    {
        $this->count = $value;
        return $this;
    }
}
