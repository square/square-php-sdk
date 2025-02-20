<?php

namespace Square\Locations\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\Location;
use Square\Core\Json\JsonProperty;

class UpdateLocationRequest extends JsonSerializableType
{
    /**
     * @var string $locationId The ID of the location to update.
     */
    private string $locationId;

    /**
     * @var ?Location $location The `Location` object with only the fields to update.
     */
    #[JsonProperty('location')]
    private ?Location $location;

    /**
     * @param array{
     *   locationId: string,
     *   location?: ?Location,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->locationId = $values['locationId'];
        $this->location = $values['location'] ?? null;
    }

    /**
     * @return string
     */
    public function getLocationId(): string
    {
        return $this->locationId;
    }

    /**
     * @param string $value
     */
    public function setLocationId(string $value): self
    {
        $this->locationId = $value;
        return $this;
    }

    /**
     * @return ?Location
     */
    public function getLocation(): ?Location
    {
        return $this->location;
    }

    /**
     * @param ?Location $value
     */
    public function setLocation(?Location $value = null): self
    {
        $this->location = $value;
        return $this;
    }
}
