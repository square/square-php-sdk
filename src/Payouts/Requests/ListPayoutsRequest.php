<?php

namespace Square\Payouts\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\PayoutStatus;
use Square\Types\SortOrder;

class ListPayoutsRequest extends JsonSerializableType
{
    /**
     * The ID of the location for which to list the payouts.
     * By default, payouts are returned for the default (main) location associated with the seller.
     *
     * @var ?string $locationId
     */
    private ?string $locationId;

    /**
     * @var ?value-of<PayoutStatus> $status If provided, only payouts with the given status are returned.
     */
    private ?string $status;

    /**
     * The timestamp for the beginning of the payout creation time, in RFC 3339 format.
     * Inclusive. Default: The current time minus one year.
     *
     * @var ?string $beginTime
     */
    private ?string $beginTime;

    /**
     * The timestamp for the end of the payout creation time, in RFC 3339 format.
     * Default: The current time.
     *
     * @var ?string $endTime
     */
    private ?string $endTime;

    /**
     * @var ?value-of<SortOrder> $sortOrder The order in which payouts are listed.
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
     *   locationId?: ?string,
     *   status?: ?value-of<PayoutStatus>,
     *   beginTime?: ?string,
     *   endTime?: ?string,
     *   sortOrder?: ?value-of<SortOrder>,
     *   cursor?: ?string,
     *   limit?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->locationId = $values['locationId'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->beginTime = $values['beginTime'] ?? null;
        $this->endTime = $values['endTime'] ?? null;
        $this->sortOrder = $values['sortOrder'] ?? null;
        $this->cursor = $values['cursor'] ?? null;
        $this->limit = $values['limit'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getLocationId(): ?string
    {
        return $this->locationId;
    }

    /**
     * @param ?string $value
     */
    public function setLocationId(?string $value = null): self
    {
        $this->locationId = $value;
        return $this;
    }

    /**
     * @return ?value-of<PayoutStatus>
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param ?value-of<PayoutStatus> $value
     */
    public function setStatus(?string $value = null): self
    {
        $this->status = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getBeginTime(): ?string
    {
        return $this->beginTime;
    }

    /**
     * @param ?string $value
     */
    public function setBeginTime(?string $value = null): self
    {
        $this->beginTime = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getEndTime(): ?string
    {
        return $this->endTime;
    }

    /**
     * @param ?string $value
     */
    public function setEndTime(?string $value = null): self
    {
        $this->endTime = $value;
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
