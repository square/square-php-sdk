<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Information about a merge operation, which creates a new customer using aggregated properties from two or more existing customers.
 */
class CustomerDeletedEventEventContextMerge extends JsonSerializableType
{
    /**
     * @var ?array<string> $fromCustomerIds The IDs of the existing customers that were merged and then deleted.
     */
    #[JsonProperty('from_customer_ids'), ArrayType(['string'])]
    private ?array $fromCustomerIds;

    /**
     * @var ?string $toCustomerId The ID of the new customer created by the merge.
     */
    #[JsonProperty('to_customer_id')]
    private ?string $toCustomerId;

    /**
     * @param array{
     *   fromCustomerIds?: ?array<string>,
     *   toCustomerId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->fromCustomerIds = $values['fromCustomerIds'] ?? null;
        $this->toCustomerId = $values['toCustomerId'] ?? null;
    }

    /**
     * @return ?array<string>
     */
    public function getFromCustomerIds(): ?array
    {
        return $this->fromCustomerIds;
    }

    /**
     * @param ?array<string> $value
     */
    public function setFromCustomerIds(?array $value = null): self
    {
        $this->fromCustomerIds = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getToCustomerId(): ?string
    {
        return $this->toCustomerId;
    }

    /**
     * @param ?string $value
     */
    public function setToCustomerId(?string $value = null): self
    {
        $this->toCustomerId = $value;
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
