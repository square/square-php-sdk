<?php

namespace Square\Customers\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\BulkCreateCustomerData;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class BulkCreateCustomersRequest extends JsonSerializableType
{
    /**
     * A map of 1 to 100 individual create requests, represented by `idempotency key: { customer data }`
     * key-value pairs.
     *
     * Each key is an [idempotency key](https://developer.squareup.com/docs/build-basics/common-api-patterns/idempotency)
     * that uniquely identifies the create request. Each value contains the customer data used to create the
     * customer profile.
     *
     * @var array<string, BulkCreateCustomerData> $customers
     */
    #[JsonProperty('customers'), ArrayType(['string' => BulkCreateCustomerData::class])]
    private array $customers;

    /**
     * @param array{
     *   customers: array<string, BulkCreateCustomerData>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->customers = $values['customers'];
    }

    /**
     * @return array<string, BulkCreateCustomerData>
     */
    public function getCustomers(): array
    {
        return $this->customers;
    }

    /**
     * @param array<string, BulkCreateCustomerData> $value
     */
    public function setCustomers(array $value): self
    {
        $this->customers = $value;
        return $this;
    }
}
