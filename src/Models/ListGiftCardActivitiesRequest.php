<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Returns a list of gift card activities. You can optionally specify a filter to retrieve a
 * subset of activites.
 */
class ListGiftCardActivitiesRequest implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $giftCardId;

    /**
     * @var string|null
     */
    private $type;

    /**
     * @var string|null
     */
    private $locationId;

    /**
     * @var string|null
     */
    private $beginTime;

    /**
     * @var string|null
     */
    private $endTime;

    /**
     * @var int|null
     */
    private $limit;

    /**
     * @var string|null
     */
    private $cursor;

    /**
     * @var string|null
     */
    private $sortOrder;

    /**
     * Returns Gift Card Id.
     *
     * If you provide a gift card ID, the endpoint returns activities that belong
     * to the specified gift card. Otherwise, the endpoint returns all gift card activities for
     * the seller.
     */
    public function getGiftCardId(): ?string
    {
        return $this->giftCardId;
    }

    /**
     * Sets Gift Card Id.
     *
     * If you provide a gift card ID, the endpoint returns activities that belong
     * to the specified gift card. Otherwise, the endpoint returns all gift card activities for
     * the seller.
     *
     * @maps gift_card_id
     */
    public function setGiftCardId(?string $giftCardId): void
    {
        $this->giftCardId = $giftCardId;
    }

    /**
     * Returns Type.
     *
     * If you provide a type, the endpoint returns gift card activities of this type.
     * Otherwise, the endpoint returns all types of gift card activities.
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Sets Type.
     *
     * If you provide a type, the endpoint returns gift card activities of this type.
     * Otherwise, the endpoint returns all types of gift card activities.
     *
     * @maps type
     */
    public function setType(?string $type): void
    {
        $this->type = $type;
    }

    /**
     * Returns Location Id.
     *
     * If you provide a location ID, the endpoint returns gift card activities for that location.
     * Otherwise, the endpoint returns gift card activities for all locations.
     */
    public function getLocationId(): ?string
    {
        return $this->locationId;
    }

    /**
     * Sets Location Id.
     *
     * If you provide a location ID, the endpoint returns gift card activities for that location.
     * Otherwise, the endpoint returns gift card activities for all locations.
     *
     * @maps location_id
     */
    public function setLocationId(?string $locationId): void
    {
        $this->locationId = $locationId;
    }

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
     * Inclusive. Default: The current time.
     */
    public function getEndTime(): ?string
    {
        return $this->endTime;
    }

    /**
     * Sets End Time.
     *
     * The timestamp for the end of the reporting period, in RFC 3339 format.
     * Inclusive. Default: The current time.
     *
     * @maps end_time
     */
    public function setEndTime(?string $endTime): void
    {
        $this->endTime = $endTime;
    }

    /**
     * Returns Limit.
     *
     * If you provide a limit value, the endpoint returns the specified number
     * of results (or less) per page. A maximum value is 100. The default value is 50.
     */
    public function getLimit(): ?int
    {
        return $this->limit;
    }

    /**
     * Sets Limit.
     *
     * If you provide a limit value, the endpoint returns the specified number
     * of results (or less) per page. A maximum value is 100. The default value is 50.
     *
     * @maps limit
     */
    public function setLimit(?int $limit): void
    {
        $this->limit = $limit;
    }

    /**
     * Returns Cursor.
     *
     * A pagination cursor returned by a previous call to this endpoint.
     * Provide this cursor to retrieve the next set of results for the original query.
     * If you do not provide the cursor, the call returns the first page of the results.
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
     * If you do not provide the cursor, the call returns the first page of the results.
     *
     * @maps cursor
     */
    public function setCursor(?string $cursor): void
    {
        $this->cursor = $cursor;
    }

    /**
     * Returns Sort Order.
     *
     * The order in which the endpoint returns the activities, based on `created_at`.
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
     * The order in which the endpoint returns the activities, based on `created_at`.
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
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->giftCardId)) {
            $json['gift_card_id'] = $this->giftCardId;
        }
        if (isset($this->type)) {
            $json['type']         = $this->type;
        }
        if (isset($this->locationId)) {
            $json['location_id']  = $this->locationId;
        }
        if (isset($this->beginTime)) {
            $json['begin_time']   = $this->beginTime;
        }
        if (isset($this->endTime)) {
            $json['end_time']     = $this->endTime;
        }
        if (isset($this->limit)) {
            $json['limit']        = $this->limit;
        }
        if (isset($this->cursor)) {
            $json['cursor']       = $this->cursor;
        }
        if (isset($this->sortOrder)) {
            $json['sort_order']   = $this->sortOrder;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
