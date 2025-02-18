<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Details about the customer making the payment.
 */
class CustomerDetails extends JsonSerializableType
{
    /**
     * @var ?bool $customerInitiated Indicates whether the customer initiated the payment.
     */
    #[JsonProperty('customer_initiated')]
    private ?bool $customerInitiated;

    /**
     * Indicates that the seller keyed in payment details on behalf of the customer.
     * This is used to flag a payment as Mail Order / Telephone Order (MOTO).
     *
     * @var ?bool $sellerKeyedIn
     */
    #[JsonProperty('seller_keyed_in')]
    private ?bool $sellerKeyedIn;

    /**
     * @param array{
     *   customerInitiated?: ?bool,
     *   sellerKeyedIn?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->customerInitiated = $values['customerInitiated'] ?? null;
        $this->sellerKeyedIn = $values['sellerKeyedIn'] ?? null;
    }

    /**
     * @return ?bool
     */
    public function getCustomerInitiated(): ?bool
    {
        return $this->customerInitiated;
    }

    /**
     * @param ?bool $value
     */
    public function setCustomerInitiated(?bool $value = null): self
    {
        $this->customerInitiated = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getSellerKeyedIn(): ?bool
    {
        return $this->sellerKeyedIn;
    }

    /**
     * @param ?bool $value
     */
    public function setSellerKeyedIn(?bool $value = null): self
    {
        $this->sellerKeyedIn = $value;
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
