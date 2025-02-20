<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * The search criteria for the loyalty accounts.
 */
class SearchLoyaltyAccountsRequestLoyaltyAccountQuery extends JsonSerializableType
{
    /**
     * The set of mappings to use in the loyalty account search.
     *
     * This cannot be combined with `customer_ids`.
     *
     * Max: 30 mappings
     *
     * @var ?array<LoyaltyAccountMapping> $mappings
     */
    #[JsonProperty('mappings'), ArrayType([LoyaltyAccountMapping::class])]
    private ?array $mappings;

    /**
     * The set of customer IDs to use in the loyalty account search.
     *
     * This cannot be combined with `mappings`.
     *
     * Max: 30 customer IDs
     *
     * @var ?array<string> $customerIds
     */
    #[JsonProperty('customer_ids'), ArrayType(['string'])]
    private ?array $customerIds;

    /**
     * @param array{
     *   mappings?: ?array<LoyaltyAccountMapping>,
     *   customerIds?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->mappings = $values['mappings'] ?? null;
        $this->customerIds = $values['customerIds'] ?? null;
    }

    /**
     * @return ?array<LoyaltyAccountMapping>
     */
    public function getMappings(): ?array
    {
        return $this->mappings;
    }

    /**
     * @param ?array<LoyaltyAccountMapping> $value
     */
    public function setMappings(?array $value = null): self
    {
        $this->mappings = $value;
        return $this;
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
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
