<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Filter events by location.
 */
class LoyaltyEventLocationFilter implements \JsonSerializable
{
    /**
     * @var string[]
     */
    private $locationIds;

    /**
     * @param string[] $locationIds
     */
    public function __construct(array $locationIds)
    {
        $this->locationIds = $locationIds;
    }

    /**
     * Returns Location Ids.
     *
     * The [location]($m/Location) IDs for loyalty events to query.
     * If multiple values are specified, the endpoint uses
     * a logical OR to combine them.
     *
     * @return string[]
     */
    public function getLocationIds(): array
    {
        return $this->locationIds;
    }

    /**
     * Sets Location Ids.
     *
     * The [location]($m/Location) IDs for loyalty events to query.
     * If multiple values are specified, the endpoint uses
     * a logical OR to combine them.
     *
     * @required
     * @maps location_ids
     *
     * @param string[] $locationIds
     */
    public function setLocationIds(array $locationIds): void
    {
        $this->locationIds = $locationIds;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['location_ids'] = $this->locationIds;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
