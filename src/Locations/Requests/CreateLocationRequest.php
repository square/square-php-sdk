<?php

namespace Square\Locations\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\Location;
use Square\Core\Json\JsonProperty;

class CreateLocationRequest extends JsonSerializableType
{
    /**
     * The initial values of the location being created. The `name` field is required and must be unique within a seller account.
     * All other fields are optional, but any information you care about for the location should be included.
     * The remaining fields are automatically added based on the data from the [main location](https://developer.squareup.com/docs/locations-api#about-the-main-location).
     *
     * @var ?Location $location
     */
    #[JsonProperty('location')]
    private ?Location $location;

    /**
     * @param array{
     *   location?: ?Location,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->location = $values['location'] ?? null;
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
