<?php

declare(strict_types=1);

namespace Square\Models;

class BatchRetrieveInventoryCountsRequest implements \JsonSerializable
{
    /**
     * @var string[]|null
     */
    private $catalogObjectIds;

    /**
     * @var string[]|null
     */
    private $locationIds;

    /**
     * @var string|null
     */
    private $updatedAfter;

    /**
     * @var string|null
     */
    private $cursor;

    /**
     * Returns Catalog Object Ids.
     *
     * Filters results by `CatalogObject` ID.
     * Only applied when set. Max size is 1000 IDs. Default: unset.
     *
     * @return string[]|null
     */
    public function getCatalogObjectIds(): ?array
    {
        return $this->catalogObjectIds;
    }

    /**
     * Sets Catalog Object Ids.
     *
     * Filters results by `CatalogObject` ID.
     * Only applied when set. Max size is 1000 IDs. Default: unset.
     *
     * @maps catalog_object_ids
     *
     * @param string[]|null $catalogObjectIds
     */
    public function setCatalogObjectIds(?array $catalogObjectIds): void
    {
        $this->catalogObjectIds = $catalogObjectIds;
    }

    /**
     * Returns Location Ids.
     *
     * Filters results by `Location` ID. Only
     * applied when set. Default: unset.
     *
     * @return string[]|null
     */
    public function getLocationIds(): ?array
    {
        return $this->locationIds;
    }

    /**
     * Sets Location Ids.
     *
     * Filters results by `Location` ID. Only
     * applied when set. Default: unset.
     *
     * @maps location_ids
     *
     * @param string[]|null $locationIds
     */
    public function setLocationIds(?array $locationIds): void
    {
        $this->locationIds = $locationIds;
    }

    /**
     * Returns Updated After.
     *
     * Provided as an RFC 3339 timestamp. Returns results whose
     * `calculated_at` value is after the given time. Default: UNIX epoch
     * (`1970-01-01T00:00:00Z`).
     */
    public function getUpdatedAfter(): ?string
    {
        return $this->updatedAfter;
    }

    /**
     * Sets Updated After.
     *
     * Provided as an RFC 3339 timestamp. Returns results whose
     * `calculated_at` value is after the given time. Default: UNIX epoch
     * (`1970-01-01T00:00:00Z`).
     *
     * @maps updated_after
     */
    public function setUpdatedAfter(?string $updatedAfter): void
    {
        $this->updatedAfter = $updatedAfter;
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
        $json['catalog_object_ids'] = $this->catalogObjectIds;
        $json['location_ids']     = $this->locationIds;
        $json['updated_after']    = $this->updatedAfter;
        $json['cursor']           = $this->cursor;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
