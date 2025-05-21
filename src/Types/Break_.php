<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * A record of a team member's break on a [timecard](entity:Timecard).
 */
class Break_ extends JsonSerializableType
{
    /**
     * @var ?string $id The UUID for this object.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * RFC 3339; follows the same timezone information as the [timecard](entity:Timecard). Precision up to
     * the minute is respected; seconds are truncated.
     *
     * @var string $startAt
     */
    #[JsonProperty('start_at')]
    private string $startAt;

    /**
     * RFC 3339; follows the same timezone information as the [timecard](entity:Timecard). Precision up to
     * the minute is respected; seconds are truncated.
     *
     * @var ?string $endAt
     */
    #[JsonProperty('end_at')]
    private ?string $endAt;

    /**
     * @var string $breakTypeId The [BreakType](entity:BreakType) that this break was templated on.
     */
    #[JsonProperty('break_type_id')]
    private string $breakTypeId;

    /**
     * @var string $name A human-readable name.
     */
    #[JsonProperty('name')]
    private string $name;

    /**
     * Format: RFC-3339 P[n]Y[n]M[n]DT[n]H[n]M[n]S. The expected length of
     * the break.
     *
     * Example for break expected duration of 15 minutes: PT15M
     *
     * @var string $expectedDuration
     */
    #[JsonProperty('expected_duration')]
    private string $expectedDuration;

    /**
     * Whether this break counts towards time worked for compensation
     * purposes.
     *
     * @var bool $isPaid
     */
    #[JsonProperty('is_paid')]
    private bool $isPaid;

    /**
     * @param array{
     *   startAt: string,
     *   breakTypeId: string,
     *   name: string,
     *   expectedDuration: string,
     *   isPaid: bool,
     *   id?: ?string,
     *   endAt?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'] ?? null;
        $this->startAt = $values['startAt'];
        $this->endAt = $values['endAt'] ?? null;
        $this->breakTypeId = $values['breakTypeId'];
        $this->name = $values['name'];
        $this->expectedDuration = $values['expectedDuration'];
        $this->isPaid = $values['isPaid'];
    }

    /**
     * @return ?string
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param ?string $value
     */
    public function setId(?string $value = null): self
    {
        $this->id = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getStartAt(): string
    {
        return $this->startAt;
    }

    /**
     * @param string $value
     */
    public function setStartAt(string $value): self
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
    public function getBreakTypeId(): string
    {
        return $this->breakTypeId;
    }

    /**
     * @param string $value
     */
    public function setBreakTypeId(string $value): self
    {
        $this->breakTypeId = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $value
     */
    public function setName(string $value): self
    {
        $this->name = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getExpectedDuration(): string
    {
        return $this->expectedDuration;
    }

    /**
     * @param string $value
     */
    public function setExpectedDuration(string $value): self
    {
        $this->expectedDuration = $value;
        return $this;
    }

    /**
     * @return bool
     */
    public function getIsPaid(): bool
    {
        return $this->isPaid;
    }

    /**
     * @param bool $value
     */
    public function setIsPaid(bool $value): self
    {
        $this->isPaid = $value;
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
