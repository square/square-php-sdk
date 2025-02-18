<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * The response object returned by the [UpdateLocation](api-endpoint:Locations-UpdateLocation) endpoint.
 */
class UpdateLocationResponse extends JsonSerializableType
{
    /**
     * @var ?array<Error> $errors Information about errors encountered during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @var ?Location $location The updated `Location` object.
     */
    #[JsonProperty('location')]
    private ?Location $location;

    /**
     * @param array{
     *   errors?: ?array<Error>,
     *   location?: ?Location,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->errors = $values['errors'] ?? null;
        $this->location = $values['location'] ?? null;
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

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
