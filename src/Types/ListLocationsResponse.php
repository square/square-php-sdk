<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Defines the fields that are included in the response body of a request
 * to the [ListLocations](api-endpoint:Locations-ListLocations) endpoint.
 *
 * Either `errors` or `locations` is present in a given response (never both).
 */
class ListLocationsResponse extends JsonSerializableType
{
    /**
     * @var ?array<Error> $errors Any errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @var ?array<Location> $locations The business locations.
     */
    #[JsonProperty('locations'), ArrayType([Location::class])]
    private ?array $locations;

    /**
     * @param array{
     *   errors?: ?array<Error>,
     *   locations?: ?array<Location>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->errors = $values['errors'] ?? null;
        $this->locations = $values['locations'] ?? null;
    }

    /**
     * @return ?array<Error>
     */
    public function getErrors(): ?array
    {
        return $this->errors;
    }

    /**
     * @param ?array<Error> $value
     */
    public function setErrors(?array $value = null): self
    {
        $this->errors = $value;
        return $this;
    }

    /**
     * @return ?array<Location>
     */
    public function getLocations(): ?array
    {
        return $this->locations;
    }

    /**
     * @param ?array<Location> $value
     */
    public function setLocations(?array $value = null): self
    {
        $this->locations = $value;
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
