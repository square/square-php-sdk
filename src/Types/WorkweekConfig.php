<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Sets the day of the week and hour of the day that a business starts a
 * workweek. This is used to calculate overtime pay.
 */
class WorkweekConfig extends JsonSerializableType
{
    /**
     * @var ?string $id The UUID for this object.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * The day of the week on which a business week starts for
     * compensation purposes.
     * See [Weekday](#type-weekday) for possible values
     *
     * @var value-of<Weekday> $startOfWeek
     */
    #[JsonProperty('start_of_week')]
    private string $startOfWeek;

    /**
     * The local time at which a business week starts. Represented as a
     * string in `HH:MM` format (`HH:MM:SS` is also accepted, but seconds are
     * truncated).
     *
     * @var string $startOfDayLocalTime
     */
    #[JsonProperty('start_of_day_local_time')]
    private string $startOfDayLocalTime;

    /**
     * Used for resolving concurrency issues. The request fails if the version
     * provided does not match the server version at the time of the request. If not provided,
     * Square executes a blind write; potentially overwriting data from another
     * write.
     *
     * @var ?int $version
     */
    #[JsonProperty('version')]
    private ?int $version;

    /**
     * @var ?string $createdAt A read-only timestamp in RFC 3339 format; presented in UTC.
     */
    #[JsonProperty('created_at')]
    private ?string $createdAt;

    /**
     * @var ?string $updatedAt A read-only timestamp in RFC 3339 format; presented in UTC.
     */
    #[JsonProperty('updated_at')]
    private ?string $updatedAt;

    /**
     * @param array{
     *   startOfWeek: value-of<Weekday>,
     *   startOfDayLocalTime: string,
     *   id?: ?string,
     *   version?: ?int,
     *   createdAt?: ?string,
     *   updatedAt?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'] ?? null;
        $this->startOfWeek = $values['startOfWeek'];
        $this->startOfDayLocalTime = $values['startOfDayLocalTime'];
        $this->version = $values['version'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
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
     * @return value-of<Weekday>
     */
    public function getStartOfWeek(): string
    {
        return $this->startOfWeek;
    }

    /**
     * @param value-of<Weekday> $value
     */
    public function setStartOfWeek(string $value): self
    {
        $this->startOfWeek = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getStartOfDayLocalTime(): string
    {
        return $this->startOfDayLocalTime;
    }

    /**
     * @param string $value
     */
    public function setStartOfDayLocalTime(string $value): self
    {
        $this->startOfDayLocalTime = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getVersion(): ?int
    {
        return $this->version;
    }

    /**
     * @param ?int $value
     */
    public function setVersion(?int $value = null): self
    {
        $this->version = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    /**
     * @param ?string $value
     */
    public function setCreatedAt(?string $value = null): self
    {
        $this->createdAt = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

    /**
     * @param ?string $value
     */
    public function setUpdatedAt(?string $value = null): self
    {
        $this->updatedAt = $value;
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
