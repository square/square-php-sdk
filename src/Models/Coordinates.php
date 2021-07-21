<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Latitude and longitude coordinates.
 */
class Coordinates implements \JsonSerializable
{
    /**
     * @var float|null
     */
    private $latitude;

    /**
     * @var float|null
     */
    private $longitude;

    /**
     * Returns Latitude.
     *
     * The latitude of the coordinate expressed in degrees.
     */
    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    /**
     * Sets Latitude.
     *
     * The latitude of the coordinate expressed in degrees.
     *
     * @maps latitude
     */
    public function setLatitude(?float $latitude): void
    {
        $this->latitude = $latitude;
    }

    /**
     * Returns Longitude.
     *
     * The longitude of the coordinate expressed in degrees.
     */
    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    /**
     * Sets Longitude.
     *
     * The longitude of the coordinate expressed in degrees.
     *
     * @maps longitude
     */
    public function setLongitude(?float $longitude): void
    {
        $this->longitude = $longitude;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->latitude)) {
            $json['latitude']  = $this->latitude;
        }
        if (isset($this->longitude)) {
            $json['longitude'] = $this->longitude;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
