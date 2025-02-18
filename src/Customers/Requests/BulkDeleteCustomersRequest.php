<?php

namespace Square\Customers\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class BulkDeleteCustomersRequest extends JsonSerializableType
{
    /**
     * @var array<string> $customerIds The IDs of the [customer profiles](entity:Customer) to delete.
     */
    #[JsonProperty('customer_ids'), ArrayType(['string'])]
    private array $customerIds;

    /**
     * @param array{
     *   customerIds: array<string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->customerIds = $values['customerIds'];
    }

    /**
     * @return array<string>
     */
    public function getCustomerIds(): array
    {
        return $this->customerIds;
    }

    /**
     * @param array<string> $value
     */
    public function setCustomerIds(array $value): self
    {
        $this->customerIds = $value;
        return $this;
    }
}
