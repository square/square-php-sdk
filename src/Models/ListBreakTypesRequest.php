<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * A request for a filtered set of `BreakType` objects.
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
     * Filter the returned `BreakType` results to only those that are associated with the
     * specified location.
     */
    public function getLocationId(): ?string
    {
        return $this->locationId;
    }

    /**
     * Sets Location Id.
     *
     * Filter the returned `BreakType` results to only those that are associated with the
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
     * The maximum number of `BreakType` results to return per page. The number can range between 1
     * and 200. The default is 200.
     */
    public function getLimit(): ?int
    {
        return $this->limit;
    }

    /**
     * Sets Limit.
     *
     * The maximum number of `BreakType` results to return per page. The number can range between 1
     * and 200. The default is 200.
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
     * A pointer to the next page of `BreakType` results to fetch.
     */
    public function getCursor(): ?string
    {
        return $this->cursor;
    }

    /**
     * Sets Cursor.
     *
     * A pointer to the next page of `BreakType` results to fetch.
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
        if (isset($this->locationId)) {
            $json['location_id'] = $this->locationId;
        }
        if (isset($this->limit)) {
            $json['limit']       = $this->limit;
        }
        if (isset($this->cursor)) {
            $json['cursor']      = $this->cursor;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
