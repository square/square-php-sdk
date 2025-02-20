<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Latitude and longitude coordinates.
 */
class Coordinates extends JsonSerializableType
{
    /**
     * @var ?float $latitude The latitude of the coordinate expressed in degrees.
     */
    #[JsonProperty('latitude')]
    private ?float $latitude;

    /**
     * @var ?float $longitude The longitude of the coordinate expressed in degrees.
     */
    #[JsonProperty('longitude')]
    private ?float $longitude;

    /**
     * @param array{
     *   latitude?: ?float,
     *   longitude?: ?float,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->latitude = $values['latitude'] ?? null;
        $this->longitude = $values['longitude'] ?? null;
    }

    /**
     * @return ?float
     */
    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    /**
     * @param ?float $value
     */
    public function setLatitude(?float $value = null): self
    {
        $this->latitude = $value;
        return $this;
    }

    /**
     * @return ?float
     */
    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    /**
     * @param ?float $value
     */
    public function setLongitude(?float $value = null): self
    {
        $this->longitude = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
