<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Retrieves a list of refunds for the account making the request.
 *
 * Max results per page: 100
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
     * Returns Begin Time.
     *
     * Timestamp for the beginning of the requested reporting period, in RFC 3339 format.
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
     * Timestamp for the beginning of the requested reporting period, in RFC 3339 format.
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
     * Timestamp for the end of the requested reporting period, in RFC 3339 format.
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
     * Timestamp for the end of the requested reporting period, in RFC 3339 format.
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
     * The order in which results are listed.
     * - `ASC` - oldest to newest
     * - `DESC` - newest to oldest (default).
     */
    public function getSortOrder(): ?string
    {
        return $this->sortOrder;
    }

    /**
     * Sets Sort Order.
     *
     * The order in which results are listed.
     * - `ASC` - oldest to newest
     * - `DESC` - newest to oldest (default).
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
     * Provide this to retrieve the next set of results for the original query.
     *
     * See [Pagination](https://developer.squareup.com/docs/basics/api101/pagination) for more information.
     */
    public function getCursor(): ?string
    {
        return $this->cursor;
    }

    /**
     * Sets Cursor.
     *
     * A pagination cursor returned by a previous call to this endpoint.
     * Provide this to retrieve the next set of results for the original query.
     *
     * See [Pagination](https://developer.squareup.com/docs/basics/api101/pagination) for more information.
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
     * for all locations associated with the merchant.
     */
    public function getLocationId(): ?string
    {
        return $this->locationId;
    }

    /**
     * Sets Location Id.
     *
     * Limit results to the location supplied. By default, results are returned
     * for all locations associated with the merchant.
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
     * For a list of refund status values, see [PaymentRefund](#type-paymentrefund).
     *
     * Default: If omitted refunds are returned regardless of status.
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * Sets Status.
     *
     * If provided, only refunds with the given status are returned.
     * For a list of refund status values, see [PaymentRefund](#type-paymentrefund).
     *
     * Default: If omitted refunds are returned regardless of status.
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
     * If provided, only refunds with the given source type are returned.
     * - `CARD` - List refunds only for payments where card was specified as payment
     * source.
     *
     * Default: If omitted refunds are returned regardless of source type.
     */
    public function getSourceType(): ?string
    {
        return $this->sourceType;
    }

    /**
     * Sets Source Type.
     *
     * If provided, only refunds with the given source type are returned.
     * - `CARD` - List refunds only for payments where card was specified as payment
     * source.
     *
     * Default: If omitted refunds are returned regardless of source type.
     *
     * @maps source_type
     */
    public function setSourceType(?string $sourceType): void
    {
        $this->sourceType = $sourceType;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['begin_time'] = $this->beginTime;
        $json['end_time']   = $this->endTime;
        $json['sort_order'] = $this->sortOrder;
        $json['cursor']     = $this->cursor;
        $json['location_id'] = $this->locationId;
        $json['status']     = $this->status;
        $json['source_type'] = $this->sourceType;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
