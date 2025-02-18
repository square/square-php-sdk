<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * A response to a request to get a `Shift`. The response contains
 * the requested `Shift` object and might contain a set of `Error` objects if
 * the request resulted in errors.
 */
class GetShiftResponse extends JsonSerializableType
{
    /**
     * @var ?Shift $shift The requested `Shift`.
     */
    #[JsonProperty('shift')]
    private ?Shift $shift;

    /**
     * @var ?array<Error> $errors Any errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @param array{
     *   shift?: ?Shift,
     *   errors?: ?array<Error>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->shift = $values['shift'] ?? null;
        $this->errors = $values['errors'] ?? null;
    }

    /**
     * @return ?Shift
     */
    public function getShift(): ?Shift
    {
        return $this->shift;
    }

    /**
     * @param ?Shift $value
     */
    public function setShift(?Shift $value = null): self
    {
        $this->shift = $value;
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
