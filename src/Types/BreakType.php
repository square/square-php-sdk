<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * A template for a type of [break](entity:Break) that can be added to a
 * [timecard](entity:Timecard), including the expected duration and paid status.
 */
class BreakType extends JsonSerializableType
{
    /**
     * @var ?string $id The UUID for this object.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var string $locationId The ID of the business location this type of break applies to.
     */
    #[JsonProperty('location_id')]
    private string $locationId;

    /**
     * A human-readable name for this type of break. The name is displayed to
     * team members in Square products.
     *
     * @var string $breakName
     */
    #[JsonProperty('break_name')]
    private string $breakName;

    /**
     * Format: RFC-3339 P[n]Y[n]M[n]DT[n]H[n]M[n]S. The expected length of
     * this break. Precision less than minutes is truncated.
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
     * Used for resolving concurrency issues. The request fails if the version
     * provided does not match the server version at the time of the request. If a value is not
     * provided, Square's servers execute a "blind" write; potentially
     * overwriting another writer's data.
     *
     * @var ?int $version
     */
    #[JsonProperty('version')]
    private ?int $version;

    /**
     * @var ?string $createdAt A read-only timestamp in RFC 3339 format.
     */
    #[JsonProperty('created_at')]
    private ?string $createdAt;

    /**
     * @var ?string $updatedAt A read-only timestamp in RFC 3339 format.
     */
    #[JsonProperty('updated_at')]
    private ?string $updatedAt;

    /**
     * @param array{
     *   locationId: string,
     *   breakName: string,
     *   expectedDuration: string,
     *   isPaid: bool,
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
        $this->locationId = $values['locationId'];
        $this->breakName = $values['breakName'];
        $this->expectedDuration = $values['expectedDuration'];
        $this->isPaid = $values['isPaid'];
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
     * @return string
     */
    public function getLocationId(): string
    {
        return $this->locationId;
    }

    /**
     * @param string $value
     */
    public function setLocationId(string $value): self
    {
        $this->locationId = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getBreakName(): string
    {
        return $this->breakName;
    }

    /**
     * @param string $value
     */
    public function setBreakName(string $value): self
    {
        $this->breakName = $value;
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
