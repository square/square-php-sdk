<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class SearchAvailabilityResponse extends JsonSerializableType
{
    /**
     * @var ?array<Availability> $availabilities List of appointment slots available for booking.
     */
    #[JsonProperty('availabilities'), ArrayType([Availability::class])]
    private ?array $availabilities;

    /**
     * @var ?array<Error> $errors Errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @param array{
     *   availabilities?: ?array<Availability>,
     *   errors?: ?array<Error>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->availabilities = $values['availabilities'] ?? null;
        $this->errors = $values['errors'] ?? null;
    }

    /**
     * @return ?array<Availability>
     */
    public function getAvailabilities(): ?array
    {
        return $this->availabilities;
    }

    /**
     * @param ?array<Availability> $value
     */
    public function setAvailabilities(?array $value = null): self
    {
        $this->availabilities = $value;
        return $this;
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
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
