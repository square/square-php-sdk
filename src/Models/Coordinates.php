<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

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
     * @param bool $asArrayWhenEmpty Whether to serialize this model as an array whenever no fields
     *        are set. (default: false)
     *
     * @return array|stdClass
     */
    #[\ReturnTypeWillChange] // @phan-suppress-current-line PhanUndeclaredClassAttribute for (php < 8.1)
    public function jsonSerialize(bool $asArrayWhenEmpty = false)
    {
        $json = [];
        if (isset($this->latitude)) {
            $json['latitude']  = $this->latitude;
        }
        if (isset($this->longitude)) {
            $json['longitude'] = $this->longitude;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
