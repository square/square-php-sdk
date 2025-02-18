<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * The response to a request for `Shift` objects. The response contains
 * the requested `Shift` objects and might contain a set of `Error` objects if
 * the request resulted in errors.
 */
class SearchShiftsResponse extends JsonSerializableType
{
    /**
     * @var ?array<Shift> $shifts Shifts.
     */
    #[JsonProperty('shifts'), ArrayType([Shift::class])]
    private ?array $shifts;

    /**
     * @var ?string $cursor An opaque cursor for fetching the next page.
     */
    #[JsonProperty('cursor')]
    private ?string $cursor;

    /**
     * @var ?array<Error> $errors Any errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @param array{
     *   shifts?: ?array<Shift>,
     *   cursor?: ?string,
     *   errors?: ?array<Error>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->shifts = $values['shifts'] ?? null;
        $this->cursor = $values['cursor'] ?? null;
        $this->errors = $values['errors'] ?? null;
    }

    /**
     * @return ?array<Shift>
     */
    public function getShifts(): ?array
    {
        return $this->shifts;
    }

    /**
     * @param ?array<Shift> $value
     */
    public function setShifts(?array $value = null): self
    {
        $this->shifts = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCursor(): ?string
    {
        return $this->cursor;
    }

    /**
     * @param ?string $value
     */
    public function setCursor(?string $value = null): self
    {
        $this->cursor = $value;
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
