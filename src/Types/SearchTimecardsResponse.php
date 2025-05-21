<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * The response to a request for `Timecard` objects. The response contains
 * the requested `Timecard` objects and might contain a set of `Error` objects if
 * the request resulted in errors.
 */
class SearchTimecardsResponse extends JsonSerializableType
{
    /**
     * @var ?array<Timecard> $timecards Timecards.
     */
    #[JsonProperty('timecards'), ArrayType([Timecard::class])]
    private ?array $timecards;

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
     *   timecards?: ?array<Timecard>,
     *   cursor?: ?string,
     *   errors?: ?array<Error>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->timecards = $values['timecards'] ?? null;
        $this->cursor = $values['cursor'] ?? null;
        $this->errors = $values['errors'] ?? null;
    }

    /**
     * @return ?array<Timecard>
     */
    public function getTimecards(): ?array
    {
        return $this->timecards;
    }

    /**
     * @param ?array<Timecard> $value
     */
    public function setTimecards(?array $value = null): self
    {
        $this->timecards = $value;
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
