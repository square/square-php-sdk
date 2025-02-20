<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Defines the fields that are included in the response body of
 * a request to the [UpdateCustomer](api-endpoint:Customers-UpdateCustomer) or
 * [BulkUpdateCustomers](api-endpoint:Customers-BulkUpdateCustomers) endpoint.
 *
 * Either `errors` or `customer` is present in a given response (never both).
 */
class UpdateCustomerResponse extends JsonSerializableType
{
    /**
     * @var ?array<Error> $errors Any errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @var ?Customer $customer The updated customer.
     */
    #[JsonProperty('customer')]
    private ?Customer $customer;

    /**
     * @param array{
     *   errors?: ?array<Error>,
     *   customer?: ?Customer,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->errors = $values['errors'] ?? null;
        $this->customer = $values['customer'] ?? null;
    }

    /**
     * @return ?array<Error>
     */
    public function getErrors(): ?array
    {
        return $this->errors;
    }

    /**
     * @param ?array<Error> $value
     */
    public function setErrors(?array $value = null): self
    {
        $this->errors = $value;
        return $this;
    }

    /**
     * @return ?Customer
     */
    public function getCustomer(): ?Customer
    {
        return $this->customer;
    }

    /**
     * @param ?Customer $value
     */
    public function setCustomer(?Customer $value = null): self
    {
        $this->customer = $value;
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
