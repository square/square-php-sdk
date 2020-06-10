<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * A request for a filtered set of `BreakType` objects
 */
class ListBreakTypesRequest implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $locationId;

    /**
     * @var int|null
     */
    private $limit;

    /**
     * @var string|null
     */
    private $cursor;

    /**
     * Returns Location Id.
     *
     * Filter Break Types returned to only those that are associated with the
     * specified location.
     */
    public function getLocationId(): ?string
    {
        return $this->locationId;
    }

    /**
     * Sets Location Id.
     *
     * Filter Break Types returned to only those that are associated with the
     * specified location.
     *
     * @maps location_id
     */
    public function setLocationId(?string $locationId): void
    {
        $this->locationId = $locationId;
    }

    /**
     * Returns Limit.
     *
     * Maximum number of Break Types to return per page. Can range between 1
     * and 200. The default is the maximum at 200.
     */
    public function getLimit(): ?int
    {
        return $this->limit;
    }

    /**
     * Sets Limit.
     *
     * Maximum number of Break Types to return per page. Can range between 1
     * and 200. The default is the maximum at 200.
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
     * Pointer to the next page of Break Type results to fetch.
     */
    public function getCursor(): ?string
    {
        return $this->cursor;
    }

    /**
     * Sets Cursor.
     *
     * Pointer to the next page of Break Type results to fetch.
     *
     * @maps cursor
     */
    public function setCursor(?string $cursor): void
    {
        $this->cursor = $cursor;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['location_id'] = $this->locationId;
        $json['limit']      = $this->limit;
        $json['cursor']     = $this->cursor;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
