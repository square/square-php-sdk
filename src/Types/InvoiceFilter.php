<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Describes query filters to apply.
 */
class InvoiceFilter extends JsonSerializableType
{
    /**
     * Limits the search to the specified locations. A location is required.
     * In the current implementation, only one location can be specified.
     *
     * @var array<string> $locationIds
     */
    #[JsonProperty('location_ids'), ArrayType(['string'])]
    private array $locationIds;

    /**
     * Limits the search to the specified customers, within the specified locations.
     * Specifying a customer is optional. In the current implementation,
     * a maximum of one customer can be specified.
     *
     * @var ?array<string> $customerIds
     */
    #[JsonProperty('customer_ids'), ArrayType(['string'])]
    private ?array $customerIds;

    /**
     * @param array{
     *   locationIds: array<string>,
     *   customerIds?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->locationIds = $values['locationIds'];
        $this->customerIds = $values['customerIds'] ?? null;
    }

    /**
     * @return array<string>
     */
    public function getLocationIds(): array
    {
        return $this->locationIds;
    }

    /**
     * @param array<string> $value
     */
    public function setLocationIds(array $value): self
    {
        $this->locationIds = $value;
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
