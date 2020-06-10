<?php

declare(strict_types=1);

namespace Square\Models;

class RetrieveCashDrawerShiftRequest implements \JsonSerializable
{
    /**
     * @var string
     */
    private $locationId;

    /**
     * @param string $locationId
     */
    public function __construct(string $locationId)
    {
        $this->locationId = $locationId;
    }

    /**
     * Returns Location Id.
     *
     * The ID of the location to retrieve cash drawer shifts from.
     */
    public function getLocationId(): string
    {
        return $this->locationId;
    }

    /**
     * Sets Location Id.
     *
     * The ID of the location to retrieve cash drawer shifts from.
     *
     * @required
     * @maps location_id
     */
    public function setLocationId(string $locationId): void
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
        $json['location_id'] = $this->locationId;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
