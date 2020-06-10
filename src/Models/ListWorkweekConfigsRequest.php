<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * A request for a set of `WorkweekConfig` objects
 */
class ListWorkweekConfigsRequest implements \JsonSerializable
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
     * Returns Limit.
     *
     * Maximum number of Workweek Configs to return per page.
     */
    public function getLimit(): ?int
    {
        return $this->limit;
    }

    /**
     * Sets Limit.
     *
     * Maximum number of Workweek Configs to return per page.
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
     * Pointer to the next page of Workweek Config results to fetch.
     */
    public function getCursor(): ?string
    {
        return $this->cursor;
    }

    /**
     * Sets Cursor.
     *
     * Pointer to the next page of Workweek Config results to fetch.
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
        $json['limit']  = $this->limit;
        $json['cursor'] = $this->cursor;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
