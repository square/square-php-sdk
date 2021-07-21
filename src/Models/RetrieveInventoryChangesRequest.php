<?php

declare(strict_types=1);

namespace Square\Models;

class RetrieveInventoryChangesRequest implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $locationIds;

    /**
     * @var string|null
     */
    private $cursor;

    /**
     * Returns Location Ids.
     *
     * The [Location]($m/Location) IDs to look up as a comma-separated
     * list. An empty list queries all locations.
     */
    public function getLocationIds(): ?string
    {
        return $this->locationIds;
    }

    /**
     * Sets Location Ids.
     *
     * The [Location]($m/Location) IDs to look up as a comma-separated
     * list. An empty list queries all locations.
     *
     * @maps location_ids
     */
    public function setLocationIds(?string $locationIds): void
    {
        $this->locationIds = $locationIds;
    }

    /**
     * Returns Cursor.
     *
     * A pagination cursor returned by a previous call to this endpoint.
     * Provide this to retrieve the next set of results for the original query.
     *
     * See the [Pagination](https://developer.squareup.com/docs/working-with-apis/pagination) guide for
     * more information.
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
     * See the [Pagination](https://developer.squareup.com/docs/working-with-apis/pagination) guide for
     * more information.
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
        if (isset($this->locationIds)) {
            $json['location_ids'] = $this->locationIds;
        }
        if (isset($this->cursor)) {
            $json['cursor']       = $this->cursor;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
