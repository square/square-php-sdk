<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Describes buyer data to prepopulate in the payment form.
 * For more information,
 * see [Optional Checkout Configurations](https://developer.squareup.com/docs/checkout-api/optional-checkout-configurations).
 */
class PrePopulatedData extends JsonSerializableType
{
    /**
     * @var ?string $buyerEmail The buyer email to prepopulate in the payment form.
     */
    #[JsonProperty('buyer_email')]
    private ?string $buyerEmail;

    /**
     * @var ?string $buyerPhoneNumber The buyer phone number to prepopulate in the payment form.
     */
    #[JsonProperty('buyer_phone_number')]
    private ?string $buyerPhoneNumber;

    /**
     * @var ?Address $buyerAddress The buyer address to prepopulate in the payment form.
     */
    #[JsonProperty('buyer_address')]
    private ?Address $buyerAddress;

    /**
     * @param array{
     *   buyerEmail?: ?string,
     *   buyerPhoneNumber?: ?string,
     *   buyerAddress?: ?Address,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->buyerEmail = $values['buyerEmail'] ?? null;
        $this->buyerPhoneNumber = $values['buyerPhoneNumber'] ?? null;
        $this->buyerAddress = $values['buyerAddress'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getBuyerEmail(): ?string
    {
        return $this->buyerEmail;
    }

    /**
     * @param ?string $value
     */
    public function setBuyerEmail(?string $value = null): self
    {
        $this->buyerEmail = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getBuyerPhoneNumber(): ?string
    {
        return $this->buyerPhoneNumber;
    }

    /**
     * @param ?string $value
     */
    public function setBuyerPhoneNumber(?string $value = null): self
    {
        $this->buyerPhoneNumber = $value;
        return $this;
    }

    /**
     * @return ?Address
     */
    public function getBuyerAddress(): ?Address
    {
        return $this->buyerAddress;
    }

    /**
     * @param ?Address $value
     */
    public function setBuyerAddress(?Address $value = null): self
    {
        $this->buyerAddress = $value;
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
