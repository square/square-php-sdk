<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Defines the request parameters for the `ListDisputes` endpoint.
 */
class ListDisputesRequest implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $cursor;

    /**
     * @var string[]|null
     */
    private $states;

    /**
     * @var string|null
     */
    private $locationId;

    /**
     * Returns Cursor.
     *
     * A pagination cursor returned by a previous call to this endpoint.
     * Provide this cursor to retrieve the next set of results for the original query.
     * For more information, see [Pagination](https://developer.squareup.com/docs/basics/api101/pagination).
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
     * For more information, see [Pagination](https://developer.squareup.com/docs/basics/api101/pagination).
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
     * The dispute states to filter the result.
     * If not specified, the endpoint returns all open disputes (the dispute status is not `INQUIRY_CLOSED`,
     * `WON`,
     * or `LOST`).
     * See [DisputeState](#type-disputestate) for possible values
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
     * The dispute states to filter the result.
     * If not specified, the endpoint returns all open disputes (the dispute status is not `INQUIRY_CLOSED`,
     * `WON`,
     * or `LOST`).
     * See [DisputeState](#type-disputestate) for possible values
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
     * Returns Location Id.
     *
     * The ID of the location for which to return a list of disputes. If not specified, the endpoint
     * returns
     * all open disputes (the dispute status is not `INQUIRY_CLOSED`, `WON`, or `LOST`) associated with all
     * locations.
     */
    public function getLocationId(): ?string
    {
        return $this->locationId;
    }

    /**
     * Sets Location Id.
     *
     * The ID of the location for which to return a list of disputes. If not specified, the endpoint
     * returns
     * all open disputes (the dispute status is not `INQUIRY_CLOSED`, `WON`, or `LOST`) associated with all
     * locations.
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
        if (isset($this->cursor)) {
            $json['cursor']      = $this->cursor;
        }
        if (isset($this->states)) {
            $json['states']      = $this->states;
        }
        if (isset($this->locationId)) {
            $json['location_id'] = $this->locationId;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
