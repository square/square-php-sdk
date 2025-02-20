<?php

namespace Square\Refunds\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\ListPaymentRefundsRequestSortField;

class ListRefundsRequest extends JsonSerializableType
{
    /**
     * Indicates the start of the time range to retrieve each `PaymentRefund` for, in RFC 3339
     * format.  The range is determined using the `created_at` field for each `PaymentRefund`.
     *
     * Default: The current time minus one year.
     *
     * @var ?string $beginTime
     */
    private ?string $beginTime;

    /**
     * Indicates the end of the time range to retrieve each `PaymentRefund` for, in RFC 3339
     * format.  The range is determined using the `created_at` field for each `PaymentRefund`.
     *
     * Default: The current time.
     *
     * @var ?string $endTime
     */
    private ?string $endTime;

    /**
     * The order in which results are listed by `PaymentRefund.created_at`:
     * - `ASC` - Oldest to newest.
     * - `DESC` - Newest to oldest (default).
     *
     * @var ?string $sortOrder
     */
    private ?string $sortOrder;

    /**
     * A pagination cursor returned by a previous call to this endpoint.
     * Provide this cursor to retrieve the next set of results for the original query.
     *
     * For more information, see [Pagination](https://developer.squareup.com/docs/build-basics/common-api-patterns/pagination).
     *
     * @var ?string $cursor
     */
    private ?string $cursor;

    /**
     * Limit results to the location supplied. By default, results are returned
     * for all locations associated with the seller.
     *
     * @var ?string $locationId
     */
    private ?string $locationId;

    /**
     * If provided, only refunds with the given status are returned.
     * For a list of refund status values, see [PaymentRefund](entity:PaymentRefund).
     *
     * Default: If omitted, refunds are returned regardless of their status.
     *
     * @var ?string $status
     */
    private ?string $status;

    /**
     * If provided, only returns refunds whose payments have the indicated source type.
     * Current values include `CARD`, `BANK_ACCOUNT`, `WALLET`, `CASH`, and `EXTERNAL`.
     * For information about these payment source types, see
     * [Take Payments](https://developer.squareup.com/docs/payments-api/take-payments).
     *
     * Default: If omitted, refunds are returned regardless of the source type.
     *
     * @var ?string $sourceType
     */
    private ?string $sourceType;

    /**
     * The maximum number of results to be returned in a single page.
     *
     * It is possible to receive fewer results than the specified limit on a given page.
     *
     * If the supplied value is greater than 100, no more than 100 results are returned.
     *
     * Default: 100
     *
     * @var ?int $limit
     */
    private ?int $limit;

    /**
     * Indicates the start of the time range to retrieve each `PaymentRefund` for, in RFC 3339
     * format.  The range is determined using the `updated_at` field for each `PaymentRefund`.
     *
     * Default: If omitted, the time range starts at `begin_time`.
     *
     * @var ?string $updatedAtBeginTime
     */
    private ?string $updatedAtBeginTime;

    /**
     * Indicates the end of the time range to retrieve each `PaymentRefund` for, in RFC 3339
     * format.  The range is determined using the `updated_at` field for each `PaymentRefund`.
     *
     * Default: The current time.
     *
     * @var ?string $updatedAtEndTime
     */
    private ?string $updatedAtEndTime;

    /**
     * @var ?value-of<ListPaymentRefundsRequestSortField> $sortField The field used to sort results by. The default is `CREATED_AT`.
     */
    private ?string $sortField;

    /**
     * @param array{
     *   beginTime?: ?string,
     *   endTime?: ?string,
     *   sortOrder?: ?string,
     *   cursor?: ?string,
     *   locationId?: ?string,
     *   status?: ?string,
     *   sourceType?: ?string,
     *   limit?: ?int,
     *   updatedAtBeginTime?: ?string,
     *   updatedAtEndTime?: ?string,
     *   sortField?: ?value-of<ListPaymentRefundsRequestSortField>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->beginTime = $values['beginTime'] ?? null;
        $this->endTime = $values['endTime'] ?? null;
        $this->sortOrder = $values['sortOrder'] ?? null;
        $this->cursor = $values['cursor'] ?? null;
        $this->locationId = $values['locationId'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->sourceType = $values['sourceType'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->updatedAtBeginTime = $values['updatedAtBeginTime'] ?? null;
        $this->updatedAtEndTime = $values['updatedAtEndTime'] ?? null;
        $this->sortField = $values['sortField'] ?? null;
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
     * @return ?string
     */
    public function getSortOrder(): ?string
    {
        return $this->sortOrder;
    }

    /**
     * @param ?string $value
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
     * @return ?string
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param ?string $value
     */
    public function setStatus(?string $value = null): self
    {
        $this->status = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getSourceType(): ?string
    {
        return $this->sourceType;
    }

    /**
     * @param ?string $value
     */
    public function setSourceType(?string $value = null): self
    {
        $this->sourceType = $value;
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
     * @return ?string
     */
    public function getUpdatedAtBeginTime(): ?string
    {
        return $this->updatedAtBeginTime;
    }

    /**
     * @param ?string $value
     */
    public function setUpdatedAtBeginTime(?string $value = null): self
    {
        $this->updatedAtBeginTime = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getUpdatedAtEndTime(): ?string
    {
        return $this->updatedAtEndTime;
    }

    /**
     * @param ?string $value
     */
    public function setUpdatedAtEndTime(?string $value = null): self
    {
        $this->updatedAtEndTime = $value;
        return $this;
    }

    /**
     * @return ?value-of<ListPaymentRefundsRequestSortField>
     */
    public function getSortField(): ?string
    {
        return $this->sortField;
    }

    /**
     * @param ?value-of<ListPaymentRefundsRequestSortField> $value
     */
    public function setSortField(?string $value = null): self
    {
        $this->sortField = $value;
        return $this;
    }
}
