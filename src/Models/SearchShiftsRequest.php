<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * A request for a filtered and sorted set of `Shift` objects.
 */
class SearchShiftsRequest implements \JsonSerializable
{
    /**
     * @var ShiftQuery|null
     */
    private $query;

    /**
     * @var int|null
     */
    private $limit;

    /**
     * @var string|null
     */
    private $cursor;

    /**
     * Returns Query.
     *
     * The parameters of a `Shift` search query. Includes filter and sort options.
     */
    public function getQuery(): ?ShiftQuery
    {
        return $this->query;
    }

    /**
     * Sets Query.
     *
     * The parameters of a `Shift` search query. Includes filter and sort options.
     *
     * @maps query
     */
    public function setQuery(?ShiftQuery $query): void
    {
        $this->query = $query;
    }

    /**
     * Returns Limit.
     *
     * number of resources in a page (200 by default).
     */
    public function getLimit(): ?int
    {
        return $this->limit;
    }

    /**
     * Sets Limit.
     *
     * number of resources in a page (200 by default).
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
     * opaque cursor for fetching the next page.
     */
    public function getCursor(): ?string
    {
        return $this->cursor;
    }

    /**
     * Sets Cursor.
     *
     * opaque cursor for fetching the next page.
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
        $json['query']  = $this->query;
        $json['limit']  = $this->limit;
        $json['cursor'] = $this->cursor;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
