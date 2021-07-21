<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Request object for the [UpdateLocation]($e/Locations/UpdateLocation) endpoint.
 */
class UpdateLocationRequest implements \JsonSerializable
{
    /**
     * @var Location|null
     */
    private $location;

    /**
     * Returns Location.
     */
    public function getLocation(): ?Location
    {
        return $this->location;
    }

    /**
     * Sets Location.
     *
     * @maps location
     */
    public function setLocation(?Location $location): void
    {
        $this->location = $location;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->location)) {
            $json['location'] = $this->location;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
