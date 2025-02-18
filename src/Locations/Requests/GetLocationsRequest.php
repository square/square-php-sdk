<?php

namespace Square\Locations\Requests;

use Square\Core\Json\JsonSerializableType;

class GetLocationsRequest extends JsonSerializableType
{
    /**
     * The ID of the location to retrieve. Specify the string
     * "main" to return the main location.
     *
     * @var string $locationId
     */
    private string $locationId;

    /**
     * @param array{
     *   locationId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->locationId = $values['locationId'];
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
}
