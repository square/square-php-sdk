<?php

namespace Square\Payments\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\ListPaymentsRequestSortField;

class ListPaymentsRequest extends JsonSerializableType
{
    /**
     * Indicates the start of the time range to retrieve payments for, in RFC 3339 format.
     * The range is determined using the `created_at` field for each Payment.
     * Inclusive. Default: The current time minus one year.
     *
     * @var ?string $beginTime
     */
    private ?string $beginTime;

    /**
     * Indicates the end of the time range to retrieve payments for, in RFC 3339 format.  The
     * range is determined using the `created_at` field for each Payment.
     *
     * Default: The current time.
     *
     * @var ?string $endTime
     */
    private ?string $endTime;

    /**
     * The order in which results are listed by `ListPaymentsRequest.sort_field`:
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
     * for the default (main) location associated with the seller.
     *
     * @var ?string $locationId
     */
    private ?string $locationId;

    /**
     * @var ?int $total The exact amount in the `total_money` for a payment.
     */
    private ?int $total;

    /**
     * @var ?string $last4 The last four digits of a payment card.
     */
    private ?string $last4;

    /**
     * @var ?string $cardBrand The brand of the payment card (for example, VISA).
     */
    private ?string $cardBrand;

    /**
     * The maximum number of results to be returned in a single page.
     * It is possible to receive fewer results than the specified limit on a given page.
     *
     * The default value of 100 is also the maximum allowed value. If the provided value is
     * greater than 100, it is ignored and the default value is used instead.
     *
     * Default: `100`
     *
     * @var ?int $limit
     */
    private ?int $limit;

    /**
     * @var ?bool $isOfflinePayment Whether the payment was taken offline or not.
     */
    private ?bool $isOfflinePayment;

    /**
     * Indicates the start of the time range for which to retrieve offline payments, in RFC 3339
     * format for timestamps. The range is determined using the
     * `offline_payment_details.client_created_at` field for each Payment. If set, payments without a
     * value set in `offline_payment_details.client_created_at` will not be returned.
     *
     * Default: The current time.
     *
     * @var ?string $offlineBeginTime
     */
    private ?string $offlineBeginTime;

    /**
     * Indicates the end of the time range for which to retrieve offline payments, in RFC 3339
     * format for timestamps. The range is determined using the
     * `offline_payment_details.client_created_at` field for each Payment. If set, payments without a
     * value set in `offline_payment_details.client_created_at` will not be returned.
     *
     * Default: The current time.
     *
     * @var ?string $offlineEndTime
     */
    private ?string $offlineEndTime;

    /**
     * Indicates the start of the time range to retrieve payments for, in RFC 3339 format.  The
     * range is determined using the `updated_at` field for each Payment.
     *
     * @var ?string $updatedAtBeginTime
     */
    private ?string $updatedAtBeginTime;

    /**
     * Indicates the end of the time range to retrieve payments for, in RFC 3339 format.  The
     * range is determined using the `updated_at` field for each Payment.
     *
     * @var ?string $updatedAtEndTime
     */
    private ?string $updatedAtEndTime;

    /**
     * @var ?value-of<ListPaymentsRequestSortField> $sortField The field used to sort results by. The default is `CREATED_AT`.
     */
    private ?string $sortField;

    /**
     * @param array{
     *   beginTime?: ?string,
     *   endTime?: ?string,
     *   sortOrder?: ?string,
     *   cursor?: ?string,
     *   locationId?: ?string,
     *   total?: ?int,
     *   last4?: ?string,
     *   cardBrand?: ?string,
     *   limit?: ?int,
     *   isOfflinePayment?: ?bool,
     *   offlineBeginTime?: ?string,
     *   offlineEndTime?: ?string,
     *   updatedAtBeginTime?: ?string,
     *   updatedAtEndTime?: ?string,
     *   sortField?: ?value-of<ListPaymentsRequestSortField>,
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
        $this->total = $values['total'] ?? null;
        $this->last4 = $values['last4'] ?? null;
        $this->cardBrand = $values['cardBrand'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->isOfflinePayment = $values['isOfflinePayment'] ?? null;
        $this->offlineBeginTime = $values['offlineBeginTime'] ?? null;
        $this->offlineEndTime = $values['offlineEndTime'] ?? null;
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
     * @return ?int
     */
    public function getTotal(): ?int
    {
        return $this->total;
    }

    /**
     * @param ?int $value
     */
    public function setTotal(?int $value = null): self
    {
        $this->total = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getLast4(): ?string
    {
        return $this->last4;
    }

    /**
     * @param ?string $value
     */
    public function setLast4(?string $value = null): self
    {
        $this->last4 = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCardBrand(): ?string
    {
        return $this->cardBrand;
    }

    /**
     * @param ?string $value
     */
    public function setCardBrand(?string $value = null): self
    {
        $this->cardBrand = $value;
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
     * @return ?bool
     */
    public function getIsOfflinePayment(): ?bool
    {
        return $this->isOfflinePayment;
    }

    /**
     * @param ?bool $value
     */
    public function setIsOfflinePayment(?bool $value = null): self
    {
        $this->isOfflinePayment = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getOfflineBeginTime(): ?string
    {
        return $this->offlineBeginTime;
    }

    /**
     * @param ?string $value
     */
    public function setOfflineBeginTime(?string $value = null): self
    {
        $this->offlineBeginTime = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getOfflineEndTime(): ?string
    {
        return $this->offlineEndTime;
    }

    /**
     * @param ?string $value
     */
    public function setOfflineEndTime(?string $value = null): self
    {
        $this->offlineEndTime = $value;
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
     * @return ?value-of<ListPaymentsRequestSortField>
     */
    public function getSortField(): ?string
    {
        return $this->sortField;
    }

    /**
     * @param ?value-of<ListPaymentsRequestSortField> $value
     */
    public function setSortField(?string $value = null): self
    {
        $this->sortField = $value;
        return $this;
    }
}
