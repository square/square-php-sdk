<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

/**
 * Describes a request to list refunds using
 * [ListPaymentRefunds]($e/Refunds/ListPaymentRefunds).
 *
 * The maximum results per page is 100.
 */
class ListPaymentRefundsRequest implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $beginTime;

    /**
     * @var string|null
     */
    private $endTime;

    /**
     * @var string|null
     */
    private $sortOrder;

    /**
     * @var string|null
     */
    private $cursor;

    /**
     * @var string|null
     */
    private $locationId;

    /**
     * @var string|null
     */
    private $status;

    /**
     * @var string|null
     */
    private $sourceType;

    /**
     * @var int|null
     */
    private $limit;

    /**
     * Returns Begin Time.
     *
     * The timestamp for the beginning of the requested reporting period, in RFC 3339 format.
     *
     * Default: The current time minus one year.
     */
    public function getBeginTime(): ?string
    {
        return $this->beginTime;
    }

    /**
     * Sets Begin Time.
     *
     * The timestamp for the beginning of the requested reporting period, in RFC 3339 format.
     *
     * Default: The current time minus one year.
     *
     * @maps begin_time
     */
    public function setBeginTime(?string $beginTime): void
    {
        $this->beginTime = $beginTime;
    }

    /**
     * Returns End Time.
     *
     * The timestamp for the end of the requested reporting period, in RFC 3339 format.
     *
     * Default: The current time.
     */
    public function getEndTime(): ?string
    {
        return $this->endTime;
    }

    /**
     * Sets End Time.
     *
     * The timestamp for the end of the requested reporting period, in RFC 3339 format.
     *
     * Default: The current time.
     *
     * @maps end_time
     */
    public function setEndTime(?string $endTime): void
    {
        $this->endTime = $endTime;
    }

    /**
     * Returns Sort Order.
     *
     * The order in which results are listed:
     * - `ASC` - Oldest to newest.
     * - `DESC` - Newest to oldest (default).
     */
    public function getSortOrder(): ?string
    {
        return $this->sortOrder;
    }

    /**
     * Sets Sort Order.
     *
     * The order in which results are listed:
     * - `ASC` - Oldest to newest.
     * - `DESC` - Newest to oldest (default).
     *
     * @maps sort_order
     */
    public function setSortOrder(?string $sortOrder): void
    {
        $this->sortOrder = $sortOrder;
    }

    /**
     * Returns Cursor.
     *
     * A pagination cursor returned by a previous call to this endpoint.
     * Provide this cursor to retrieve the next set of results for the original query.
     *
     * For more information, see [Pagination](https://developer.squareup.com/docs/basics/api101/pagination).
     */
    public function getCursor(): ?string
    {
        return $this->cursor;
    }

    /**
     * Sets Cursor.
     *
     * A pagination cursor returned by a previous call to this endpoint.
     * Provide this cursor to retrieve the next set of results for the original query.
     *
     * For more information, see [Pagination](https://developer.squareup.com/docs/basics/api101/pagination).
     *
     * @maps cursor
     */
    public function setCursor(?string $cursor): void
    {
        $this->cursor = $cursor;
    }

    /**
     * Returns Location Id.
     *
     * Limit results to the location supplied. By default, results are returned
     * for all locations associated with the seller.
     */
    public function getLocationId(): ?string
    {
        return $this->locationId;
    }

    /**
     * Sets Location Id.
     *
     * Limit results to the location supplied. By default, results are returned
     * for all locations associated with the seller.
     *
     * @maps location_id
     */
    public function setLocationId(?string $locationId): void
    {
        $this->locationId = $locationId;
    }

    /**
     * Returns Status.
     *
     * If provided, only refunds with the given status are returned.
     * For a list of refund status values, see [PaymentRefund]($m/PaymentRefund).
     *
     * Default: If omitted, refunds are returned regardless of their status.
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * Sets Status.
     *
     * If provided, only refunds with the given status are returned.
     * For a list of refund status values, see [PaymentRefund]($m/PaymentRefund).
     *
     * Default: If omitted, refunds are returned regardless of their status.
     *
     * @maps status
     */
    public function setStatus(?string $status): void
    {
        $this->status = $status;
    }

    /**
     * Returns Source Type.
     *
     * If provided, only returns refunds whose payments have the indicated source type.
     * Current values include `CARD`, `BANK_ACCOUNT`, `WALLET`, `CASH`, and `EXTERNAL`.
     * For information about these payment source types, see
     * [Take Payments](https://developer.squareup.com/docs/payments-api/take-payments).
     *
     * Default: If omitted, refunds are returned regardless of the source type.
     */
    public function getSourceType(): ?string
    {
        return $this->sourceType;
    }

    /**
     * Sets Source Type.
     *
     * If provided, only returns refunds whose payments have the indicated source type.
     * Current values include `CARD`, `BANK_ACCOUNT`, `WALLET`, `CASH`, and `EXTERNAL`.
     * For information about these payment source types, see
     * [Take Payments](https://developer.squareup.com/docs/payments-api/take-payments).
     *
     * Default: If omitted, refunds are returned regardless of the source type.
     *
     * @maps source_type
     */
    public function setSourceType(?string $sourceType): void
    {
        $this->sourceType = $sourceType;
    }

    /**
     * Returns Limit.
     *
     * The maximum number of results to be returned in a single page.
     *
     * It is possible to receive fewer results than the specified limit on a given page.
     *
     * If the supplied value is greater than 100, no more than 100 results are returned.
     *
     * Default: 100
     */
    public function getLimit(): ?int
    {
        return $this->limit;
    }

    /**
     * Sets Limit.
     *
     * The maximum number of results to be returned in a single page.
     *
     * It is possible to receive fewer results than the specified limit on a given page.
     *
     * If the supplied value is greater than 100, no more than 100 results are returned.
     *
     * Default: 100
     *
     * @maps limit
     */
    public function setLimit(?int $limit): void
    {
        $this->limit = $limit;
    }

    /**
     * Encode this object to JSON
     *
     * @param bool $asArrayWhenEmpty Whether to serialize this model as an array whenever no fields
     *        are set. (default: false)
     *
     * @return array|stdClass
     */
    #[\ReturnTypeWillChange] // @phan-suppress-current-line PhanUndeclaredClassAttribute for (php < 8.1)
    public function jsonSerialize(bool $asArrayWhenEmpty = false)
    {
        $json = [];
        if (isset($this->beginTime)) {
            $json['begin_time']  = $this->beginTime;
        }
        if (isset($this->endTime)) {
            $json['end_time']    = $this->endTime;
        }
        if (isset($this->sortOrder)) {
            $json['sort_order']  = $this->sortOrder;
        }
        if (isset($this->cursor)) {
            $json['cursor']      = $this->cursor;
        }
        if (isset($this->locationId)) {
            $json['location_id'] = $this->locationId;
        }
        if (isset($this->status)) {
            $json['status']      = $this->status;
        }
        if (isset($this->sourceType)) {
            $json['source_type'] = $this->sourceType;
        }
        if (isset($this->limit)) {
            $json['limit']       = $this->limit;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
