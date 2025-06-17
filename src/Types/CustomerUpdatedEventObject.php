<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * An object that contains the customer associated with the event.
 */
class CustomerUpdatedEventObject extends JsonSerializableType
{
    /**
     * @var ?Customer $customer The updated customer.
     */
    #[JsonProperty('customer')]
    private ?Customer $customer;

    /**
     * @param array{
     *   customer?: ?Customer,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->customer = $values['customer'] ?? null;
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
