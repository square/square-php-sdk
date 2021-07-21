<?php

declare(strict_types=1);

namespace Square\Models;

class ListTeamMemberBookingProfilesRequest implements \JsonSerializable
{
    /**
     * @var bool|null
     */
    private $bookableOnly;

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
    private $locationId;

    /**
     * Returns Bookable Only.
     *
     * Indicates whether to include only bookable team members in the returned result (`true`) or not
     * (`false`).
     */
    public function getBookableOnly(): ?bool
    {
        return $this->bookableOnly;
    }

    /**
     * Sets Bookable Only.
     *
     * Indicates whether to include only bookable team members in the returned result (`true`) or not
     * (`false`).
     *
     * @maps bookable_only
     */
    public function setBookableOnly(?bool $bookableOnly): void
    {
        $this->bookableOnly = $bookableOnly;
    }

    /**
     * Returns Limit.
     *
     * The maximum number of results to return.
     */
    public function getLimit(): ?int
    {
        return $this->limit;
    }

    /**
     * Sets Limit.
     *
     * The maximum number of results to return.
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
     * The cursor for paginating through the results.
     */
    public function getCursor(): ?string
    {
        return $this->cursor;
    }

    /**
     * Sets Cursor.
     *
     * The cursor for paginating through the results.
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
     * Indicates whether to include only team members enabled at the given location in the returned result.
     */
    public function getLocationId(): ?string
    {
        return $this->locationId;
    }

    /**
     * Sets Location Id.
     *
     * Indicates whether to include only team members enabled at the given location in the returned result.
     *
     * @maps location_id
     */
    public function setLocationId(?string $locationId): void
    {
        $this->locationId = $locationId;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->bookableOnly)) {
            $json['bookable_only'] = $this->bookableOnly;
        }
        if (isset($this->limit)) {
            $json['limit']         = $this->limit;
        }
        if (isset($this->cursor)) {
            $json['cursor']        = $this->cursor;
        }
        if (isset($this->locationId)) {
            $json['location_id']   = $this->locationId;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
