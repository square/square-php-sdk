<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents a generic time range. The start and end values are
 * represented in RFC 3339 format. Time ranges are customized to be
 * inclusive or exclusive based on the needs of a particular endpoint.
 * Refer to the relevant endpoint-specific documentation to determine
 * how time ranges are handled.
 */
class TimeRange extends JsonSerializableType
{
    /**
     * A datetime value in RFC 3339 format indicating when the time range
     * starts.
     *
     * @var ?string $startAt
     */
    #[JsonProperty('start_at')]
    private ?string $startAt;

    /**
     * A datetime value in RFC 3339 format indicating when the time range
     * ends.
     *
     * @var ?string $endAt
     */
    #[JsonProperty('end_at')]
    private ?string $endAt;

    /**
     * @param array{
     *   startAt?: ?string,
     *   endAt?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->startAt = $values['startAt'] ?? null;
        $this->endAt = $values['endAt'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getStartAt(): ?string
    {
        return $this->startAt;
    }

    /**
     * @param ?string $value
     */
    public function setStartAt(?string $value = null): self
    {
        $this->startAt = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getEndAt(): ?string
    {
        return $this->endAt;
    }

    /**
     * @param ?string $value
     */
    public function setEndAt(?string $value = null): self
    {
        $this->endAt = $value;
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
