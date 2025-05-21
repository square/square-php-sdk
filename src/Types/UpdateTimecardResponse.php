<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * The response to a request to update a `Timecard`. The response contains
 * the updated `Timecard` object and might contain a set of `Error` objects if
 * the request resulted in errors.
 */
class UpdateTimecardResponse extends JsonSerializableType
{
    /**
     * @var ?Timecard $timecard The updated `Timecard`.
     */
    #[JsonProperty('timecard')]
    private ?Timecard $timecard;

    /**
     * @var ?array<Error> $errors Any errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @param array{
     *   timecard?: ?Timecard,
     *   errors?: ?array<Error>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->timecard = $values['timecard'] ?? null;
        $this->errors = $values['errors'] ?? null;
    }

    /**
     * @return ?Timecard
     */
    public function getTimecard(): ?Timecard
    {
        return $this->timecard;
    }

    /**
     * @param ?Timecard $value
     */
    public function setTimecard(?Timecard $value = null): self
    {
        $this->timecard = $value;
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
