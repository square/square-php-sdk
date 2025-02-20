<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * The response object returned by the [CreateLocation](api-endpoint:Locations-CreateLocation) endpoint.
 */
class CreateLocationResponse extends JsonSerializableType
{
    /**
     * @var ?array<Error> $errors Information about [errors](https://developer.squareup.com/docs/build-basics/handling-errors) encountered during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @var ?Location $location The newly created `Location` object.
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
