<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

class ListBookingsRequest implements \JsonSerializable
{
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
    private $teamMemberId;

    /**
     * @var string|null
     */
    private $locationId;

    /**
     * @var string|null
     */
    private $startAtMin;

    /**
     * @var string|null
     */
    private $startAtMax;

    /**
     * Returns Limit.
     *
     * The maximum number of results per page to return in a paged response.
     */
    public function getLimit(): ?int
    {
        return $this->limit;
    }

    /**
     * Sets Limit.
     *
     * The maximum number of results per page to return in a paged response.
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
     * The pagination cursor from the preceding response to return the next page of the results. Do not set
     * this when retrieving the first page of the results.
     */
    public function getCursor(): ?string
    {
        return $this->cursor;
    }

    /**
     * Sets Cursor.
     *
     * The pagination cursor from the preceding response to return the next page of the results. Do not set
     * this when retrieving the first page of the results.
     *
     * @maps cursor
     */
    public function setCursor(?string $cursor): void
    {
        $this->cursor = $cursor;
    }

    /**
     * Returns Team Member Id.
     *
     * The team member for whom to retrieve bookings. If this is not set, bookings of all members are
     * retrieved.
     */
    public function getTeamMemberId(): ?string
    {
        return $this->teamMemberId;
    }

    /**
     * Sets Team Member Id.
     *
     * The team member for whom to retrieve bookings. If this is not set, bookings of all members are
     * retrieved.
     *
     * @maps team_member_id
     */
    public function setTeamMemberId(?string $teamMemberId): void
    {
        $this->teamMemberId = $teamMemberId;
    }

    /**
     * Returns Location Id.
     *
     * The location for which to retrieve bookings. If this is not set, all locations' bookings are
     * retrieved.
     */
    public function getLocationId(): ?string
    {
        return $this->locationId;
    }

    /**
     * Sets Location Id.
     *
     * The location for which to retrieve bookings. If this is not set, all locations' bookings are
     * retrieved.
     *
     * @maps location_id
     */
    public function setLocationId(?string $locationId): void
    {
        $this->locationId = $locationId;
    }

    /**
     * Returns Start at Min.
     *
     * The RFC 3339 timestamp specifying the earliest of the start time. If this is not set, the current
     * time is used.
     */
    public function getStartAtMin(): ?string
    {
        return $this->startAtMin;
    }

    /**
     * Sets Start at Min.
     *
     * The RFC 3339 timestamp specifying the earliest of the start time. If this is not set, the current
     * time is used.
     *
     * @maps start_at_min
     */
    public function setStartAtMin(?string $startAtMin): void
    {
        $this->startAtMin = $startAtMin;
    }

    /**
     * Returns Start at Max.
     *
     * The RFC 3339 timestamp specifying the latest of the start time. If this is not set, the time of 31
     * days after `start_at_min` is used.
     */
    public function getStartAtMax(): ?string
    {
        return $this->startAtMax;
    }

    /**
     * Sets Start at Max.
     *
     * The RFC 3339 timestamp specifying the latest of the start time. If this is not set, the time of 31
     * days after `start_at_min` is used.
     *
     * @maps start_at_max
     */
    public function setStartAtMax(?string $startAtMax): void
    {
        $this->startAtMax = $startAtMax;
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
        if (isset($this->limit)) {
            $json['limit']          = $this->limit;
        }
        if (isset($this->cursor)) {
            $json['cursor']         = $this->cursor;
        }
        if (isset($this->teamMemberId)) {
            $json['team_member_id'] = $this->teamMemberId;
        }
        if (isset($this->locationId)) {
            $json['location_id']    = $this->locationId;
        }
        if (isset($this->startAtMin)) {
            $json['start_at_min']   = $this->startAtMin;
        }
        if (isset($this->startAtMax)) {
            $json['start_at_max']   = $this->startAtMax;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
