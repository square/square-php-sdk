<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Represents a [PublishScheduledShift](api-endpoint:Labor-PublishScheduledShift) response.
 * Either `scheduled_shift` or `errors` is present in the response.
 */
class PublishScheduledShiftResponse extends JsonSerializableType
{
    /**
     * @var ?ScheduledShift $scheduledShift The published scheduled shift.
     */
    #[JsonProperty('scheduled_shift')]
    private ?ScheduledShift $scheduledShift;

    /**
     * @var ?array<Error> $errors Any errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @param array{
     *   scheduledShift?: ?ScheduledShift,
     *   errors?: ?array<Error>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->scheduledShift = $values['scheduledShift'] ?? null;
        $this->errors = $values['errors'] ?? null;
    }

    /**
     * @return ?ScheduledShift
     */
    public function getScheduledShift(): ?ScheduledShift
    {
        return $this->scheduledShift;
    }

    /**
     * @param ?ScheduledShift $value
     */
    public function setScheduledShift(?ScheduledShift $value = null): self
    {
        $this->scheduledShift = $value;
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
