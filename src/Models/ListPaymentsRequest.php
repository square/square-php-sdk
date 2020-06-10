<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Retrieves a list of payments taken by the account making the request.
 *
 * Max results per page: 100
 */
class ListPaymentsRequest implements \JsonSerializable
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
     * @var int|null
     */
    private $total;

    /**
     * @var string|null
     */
    private $last4;

    /**
     * @var string|null
     */
    private $cardBrand;

    /**
     * Returns Begin Time.
     *
     * Timestamp for the beginning of the reporting period, in RFC 3339 format.
     * Inclusive. Default: The current time minus one year.
     */
    public function getBeginTime(): ?string
    {
        return $this->beginTime;
    }

    /**
     * Sets Begin Time.
     *
     * Timestamp for the beginning of the reporting period, in RFC 3339 format.
     * Inclusive. Default: The current time minus one year.
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
     * Returns Total.
     *
     * The exact amount in the total_money for a `Payment`.
     */
    public function getTotal(): ?int
    {
        return $this->total;
    }

    /**
     * Sets Total.
     *
     * The exact amount in the total_money for a `Payment`.
     *
     * @maps total
     */
    public function setTotal(?int $total): void
    {
        $this->total = $total;
    }

    /**
     * Returns Last 4.
     *
     * The last 4 digits of `Payment` card.
     */
    public function getLast4(): ?string
    {
        return $this->last4;
    }

    /**
     * Sets Last 4.
     *
     * The last 4 digits of `Payment` card.
     *
     * @maps last_4
     */
    public function setLast4(?string $last4): void
    {
        $this->last4 = $last4;
    }

    /**
     * Returns Card Brand.
     *
     * The brand of `Payment` card. For example, `VISA`
     */
    public function getCardBrand(): ?string
    {
        return $this->cardBrand;
    }

    /**
     * Sets Card Brand.
     *
     * The brand of `Payment` card. For example, `VISA`
     *
     * @maps card_brand
     */
    public function setCardBrand(?string $cardBrand): void
    {
        $this->cardBrand = $cardBrand;
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
        $json['total']      = $this->total;
        $json['last_4']     = $this->last4;
        $json['card_brand'] = $this->cardBrand;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
