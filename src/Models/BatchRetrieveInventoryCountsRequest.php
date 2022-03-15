<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

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
     * @var string[]|null
     */
    private $states;

    /**
     * Returns Catalog Object Ids.
     *
     * The filter to return results by `CatalogObject` ID.
     * The filter is applicable only when set.  The default is null.
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
     * The filter to return results by `CatalogObject` ID.
     * The filter is applicable only when set.  The default is null.
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
     * The filter to return results by `Location` ID.
     * This filter is applicable only when set. The default is null.
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
     * The filter to return results by `Location` ID.
     * This filter is applicable only when set. The default is null.
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
     * The filter to return results with their `calculated_at` value
     * after the given time as specified in an RFC 3339 timestamp.
     * The default value is the UNIX epoch of (`1970-01-01T00:00:00Z`).
     */
    public function getUpdatedAfter(): ?string
    {
        return $this->updatedAfter;
    }

    /**
     * Sets Updated After.
     *
     * The filter to return results with their `calculated_at` value
     * after the given time as specified in an RFC 3339 timestamp.
     * The default value is the UNIX epoch of (`1970-01-01T00:00:00Z`).
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
     * Returns States.
     *
     * The filter to return results by `InventoryState`. The filter is only applicable when set.
     * Ignored are untracked states of `NONE`, `SOLD`, and `UNLINKED_RETURN`.
     * The default is null.
     *
     * @return string[]|null
     */
    public function getStates(): ?array
    {
        return $this->states;
    }

    /**
     * Sets States.
     *
     * The filter to return results by `InventoryState`. The filter is only applicable when set.
     * Ignored are untracked states of `NONE`, `SOLD`, and `UNLINKED_RETURN`.
     * The default is null.
     *
     * @maps states
     *
     * @param string[]|null $states
     */
    public function setStates(?array $states): void
    {
        $this->states = $states;
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
        if (isset($this->catalogObjectIds)) {
            $json['catalog_object_ids'] = $this->catalogObjectIds;
        }
        if (isset($this->locationIds)) {
            $json['location_ids']       = $this->locationIds;
        }
        if (isset($this->updatedAfter)) {
            $json['updated_after']      = $this->updatedAfter;
        }
        if (isset($this->cursor)) {
            $json['cursor']             = $this->cursor;
        }
        if (isset($this->states)) {
            $json['states']             = $this->states;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
