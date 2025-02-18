<?php

namespace Square\Payouts\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\SortOrder;

class ListEntriesPayoutsRequest extends JsonSerializableType
{
    /**
     * @var string $payoutId The ID of the payout to retrieve the information for.
     */
    private string $payoutId;

    /**
     * @var ?value-of<SortOrder> $sortOrder The order in which payout entries are listed.
     */
    private ?string $sortOrder;

    /**
     * A pagination cursor returned by a previous call to this endpoint.
     * Provide this cursor to retrieve the next set of results for the original query.
     * For more information, see [Pagination](https://developer.squareup.com/docs/build-basics/common-api-patterns/pagination).
     * If request parameters change between requests, subsequent results may contain duplicates or missing records.
     *
     * @var ?string $cursor
     */
    private ?string $cursor;

    /**
     * The maximum number of results to be returned in a single page.
     * It is possible to receive fewer results than the specified limit on a given page.
     * The default value of 100 is also the maximum allowed value. If the provided value is
     * greater than 100, it is ignored and the default value is used instead.
     * Default: `100`
     *
     * @var ?int $limit
     */
    private ?int $limit;

    /**
     * @param array{
     *   payoutId: string,
     *   sortOrder?: ?value-of<SortOrder>,
     *   cursor?: ?string,
     *   limit?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->payoutId = $values['payoutId'];
        $this->sortOrder = $values['sortOrder'] ?? null;
        $this->cursor = $values['cursor'] ?? null;
        $this->limit = $values['limit'] ?? null;
    }

    /**
     * @return string
     */
    public function getPayoutId(): string
    {
        return $this->payoutId;
    }

    /**
     * @param string $value
     */
    public function setPayoutId(string $value): self
    {
        $this->payoutId = $value;
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
}
