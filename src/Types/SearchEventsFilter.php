<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Criteria to filter events by.
 */
class SearchEventsFilter extends JsonSerializableType
{
    /**
     * @var ?array<string> $eventTypes Filter events by event types.
     */
    #[JsonProperty('event_types'), ArrayType(['string'])]
    private ?array $eventTypes;

    /**
     * @var ?array<string> $merchantIds Filter events by merchant.
     */
    #[JsonProperty('merchant_ids'), ArrayType(['string'])]
    private ?array $merchantIds;

    /**
     * @var ?array<string> $locationIds Filter events by location.
     */
    #[JsonProperty('location_ids'), ArrayType(['string'])]
    private ?array $locationIds;

    /**
     * @var ?TimeRange $createdAt Filter events by when they were created.
     */
    #[JsonProperty('created_at')]
    private ?TimeRange $createdAt;

    /**
     * @param array{
     *   eventTypes?: ?array<string>,
     *   merchantIds?: ?array<string>,
     *   locationIds?: ?array<string>,
     *   createdAt?: ?TimeRange,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->eventTypes = $values['eventTypes'] ?? null;
        $this->merchantIds = $values['merchantIds'] ?? null;
        $this->locationIds = $values['locationIds'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
    }

    /**
     * @return ?array<string>
     */
    public function getEventTypes(): ?array
    {
        return $this->eventTypes;
    }

    /**
     * @param ?array<string> $value
     */
    public function setEventTypes(?array $value = null): self
    {
        $this->eventTypes = $value;
        return $this;
    }

    /**
     * @return ?array<string>
     */
    public function getMerchantIds(): ?array
    {
        return $this->merchantIds;
    }

    /**
     * @param ?array<string> $value
     */
    public function setMerchantIds(?array $value = null): self
    {
        $this->merchantIds = $value;
        return $this;
    }

    /**
     * @return ?array<string>
     */
    public function getLocationIds(): ?array
    {
        return $this->locationIds;
    }

    /**
     * @param ?array<string> $value
     */
    public function setLocationIds(?array $value = null): self
    {
        $this->locationIds = $value;
        return $this;
    }

    /**
     * @return ?TimeRange
     */
    public function getCreatedAt(): ?TimeRange
    {
        return $this->createdAt;
    }

    /**
     * @param ?TimeRange $value
     */
    public function setCreatedAt(?TimeRange $value = null): self
    {
        $this->createdAt = $value;
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
