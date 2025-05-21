<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Represents a [SearchScheduledShifts](api-endpoint:Labor-SearchScheduledShifts) response.
 * Either `scheduled_shifts` or `errors` is present in the response.
 */
class SearchScheduledShiftsResponse extends JsonSerializableType
{
    /**
     * @var ?array<ScheduledShift> $scheduledShifts A paginated list of scheduled shifts that match the query conditions.
     */
    #[JsonProperty('scheduled_shifts'), ArrayType([ScheduledShift::class])]
    private ?array $scheduledShifts;

    /**
     * The pagination cursor used to retrieve the next page of results. This field is present
     * only if additional results are available.
     *
     * @var ?string $cursor
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
     *   scheduledShifts?: ?array<ScheduledShift>,
     *   cursor?: ?string,
     *   errors?: ?array<Error>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->scheduledShifts = $values['scheduledShifts'] ?? null;
        $this->cursor = $values['cursor'] ?? null;
        $this->errors = $values['errors'] ?? null;
    }

    /**
     * @return ?array<ScheduledShift>
     */
    public function getScheduledShifts(): ?array
    {
        return $this->scheduledShifts;
    }

    /**
     * @param ?array<ScheduledShift> $value
     */
    public function setScheduledShifts(?array $value = null): self
    {
        $this->scheduledShifts = $value;
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
