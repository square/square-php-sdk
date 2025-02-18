<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * A filter based on the order `customer_id` and any tender `customer_id`
 * associated with the order. It does not filter based on the
 * [FulfillmentRecipient](entity:FulfillmentRecipient) `customer_id`.
 */
class SearchOrdersCustomerFilter extends JsonSerializableType
{
    /**
     * A list of customer IDs to filter by.
     *
     * Max: 10 customer ids.
     *
     * @var ?array<string> $customerIds
     */
    #[JsonProperty('customer_ids'), ArrayType(['string'])]
    private ?array $customerIds;

    /**
     * @param array{
     *   customerIds?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->customerIds = $values['customerIds'] ?? null;
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
