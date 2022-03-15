<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

/**
 * Describes a request to list payments using
 * [ListPayments]($e/Payments/ListPayments).
 *
 * The maximum results per page is 100.
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
     * @var int|null
     */
    private $limit;

    /**
     * Returns Begin Time.
     *
     * The timestamp for the beginning of the reporting period, in RFC 3339 format.
     * Inclusive. Default: The current time minus one year.
     */
    public function getBeginTime(): ?string
    {
        return $this->beginTime;
    }

    /**
     * Sets Begin Time.
     *
     * The timestamp for the beginning of the reporting period, in RFC 3339 format.
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
     * The timestamp for the end of the reporting period, in RFC 3339 format.
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
     * The timestamp for the end of the reporting period, in RFC 3339 format.
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
     * for the default (main) location associated with the seller.
     */
    public function getLocationId(): ?string
    {
        return $this->locationId;
    }

    /**
     * Sets Location Id.
     *
     * Limit results to the location supplied. By default, results are returned
     * for the default (main) location associated with the seller.
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
     * The exact amount in the `total_money` for a payment.
     */
    public function getTotal(): ?int
    {
        return $this->total;
    }

    /**
     * Sets Total.
     *
     * The exact amount in the `total_money` for a payment.
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
     * The last four digits of a payment card.
     */
    public function getLast4(): ?string
    {
        return $this->last4;
    }

    /**
     * Sets Last 4.
     *
     * The last four digits of a payment card.
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
     * The brand of the payment card (for example, VISA).
     */
    public function getCardBrand(): ?string
    {
        return $this->cardBrand;
    }

    /**
     * Sets Card Brand.
     *
     * The brand of the payment card (for example, VISA).
     *
     * @maps card_brand
     */
    public function setCardBrand(?string $cardBrand): void
    {
        $this->cardBrand = $cardBrand;
    }

    /**
     * Returns Limit.
     *
     * The maximum number of results to be returned in a single page.
     * It is possible to receive fewer results than the specified limit on a given page.
     *
     * The default value of 100 is also the maximum allowed value. If the provided value is
     * greater than 100, it is ignored and the default value is used instead.
     *
     * Default: `100`
     */
    public function getLimit(): ?int
    {
        return $this->limit;
    }

    /**
     * Sets Limit.
     *
     * The maximum number of results to be returned in a single page.
     * It is possible to receive fewer results than the specified limit on a given page.
     *
     * The default value of 100 is also the maximum allowed value. If the provided value is
     * greater than 100, it is ignored and the default value is used instead.
     *
     * Default: `100`
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
        if (isset($this->total)) {
            $json['total']       = $this->total;
        }
        if (isset($this->last4)) {
            $json['last_4']      = $this->last4;
        }
        if (isset($this->cardBrand)) {
            $json['card_brand']  = $this->cardBrand;
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
