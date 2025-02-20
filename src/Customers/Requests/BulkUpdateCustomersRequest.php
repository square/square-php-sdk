<?php

namespace Square\Customers\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\BulkUpdateCustomerData;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class BulkUpdateCustomersRequest extends JsonSerializableType
{
    /**
     * A map of 1 to 100 individual update requests, represented by `customer ID: { customer data }`
     * key-value pairs.
     *
     * Each key is the ID of the [customer profile](entity:Customer) to update. To update a customer profile
     * that was created by merging existing profiles, provide the ID of the newly created profile.
     *
     * Each value contains the updated customer data. Only new or changed fields are required. To add or
     * update a field, specify the new value. To remove a field, specify `null`.
     *
     * @var array<string, BulkUpdateCustomerData> $customers
     */
    #[JsonProperty('customers'), ArrayType(['string' => BulkUpdateCustomerData::class])]
    private array $customers;

    /**
     * @param array{
     *   customers: array<string, BulkUpdateCustomerData>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->customers = $values['customers'];
    }

    /**
     * @return array<string, BulkUpdateCustomerData>
     */
    public function getCustomers(): array
    {
        return $this->customers;
    }

    /**
     * @param array<string, BulkUpdateCustomerData> $value
     */
    public function setCustomers(array $value): self
    {
        $this->customers = $value;
        return $this;
    }
}
