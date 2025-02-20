<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Represents a set of query expressions (filters) to narrow the scope of targeted subscriptions returned by
 * the [SearchSubscriptions](api-endpoint:Subscriptions-SearchSubscriptions) endpoint.
 */
class SearchSubscriptionsFilter extends JsonSerializableType
{
    /**
     * @var ?array<string> $customerIds A filter to select subscriptions based on the subscribing customer IDs.
     */
    #[JsonProperty('customer_ids'), ArrayType(['string'])]
    private ?array $customerIds;

    /**
     * @var ?array<string> $locationIds A filter to select subscriptions based on the location.
     */
    #[JsonProperty('location_ids'), ArrayType(['string'])]
    private ?array $locationIds;

    /**
     * @var ?array<string> $sourceNames A filter to select subscriptions based on the source application.
     */
    #[JsonProperty('source_names'), ArrayType(['string'])]
    private ?array $sourceNames;

    /**
     * @param array{
     *   customerIds?: ?array<string>,
     *   locationIds?: ?array<string>,
     *   sourceNames?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->customerIds = $values['customerIds'] ?? null;
        $this->locationIds = $values['locationIds'] ?? null;
        $this->sourceNames = $values['sourceNames'] ?? null;
    }

    /**
     * @return ?array<string>
     */
    public function getCustomerIds(): ?array
    {
        return $this->customerIds;
    }

    /**
     * @param ?array<string> $value
     */
    public function setCustomerIds(?array $value = null): self
    {
        $this->customerIds = $value;
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
     * @return ?array<string>
     */
    public function getSourceNames(): ?array
    {
        return $this->sourceNames;
    }

    /**
     * @param ?array<string> $value
     */
    public function setSourceNames(?array $value = null): self
    {
        $this->sourceNames = $value;
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
