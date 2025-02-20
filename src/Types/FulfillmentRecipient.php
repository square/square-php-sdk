<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Information about the fulfillment recipient.
 */
class FulfillmentRecipient extends JsonSerializableType
{
    /**
     * The ID of the customer associated with the fulfillment.
     *
     * If `customer_id` is provided, the fulfillment recipient's `display_name`,
     * `email_address`, and `phone_number` are automatically populated from the
     * targeted customer profile. If these fields are set in the request, the request
     * values override the information from the customer profile. If the
     * targeted customer profile does not contain the necessary information and
     * these fields are left unset, the request results in an error.
     *
     * @var ?string $customerId
     */
    #[JsonProperty('customer_id')]
    private ?string $customerId;

    /**
     * The display name of the fulfillment recipient. This field is required.
     *
     * If provided, the display name overrides the corresponding customer profile value
     * indicated by `customer_id`.
     *
     * @var ?string $displayName
     */
    #[JsonProperty('display_name')]
    private ?string $displayName;

    /**
     * The email address of the fulfillment recipient.
     *
     * If provided, the email address overrides the corresponding customer profile value
     * indicated by `customer_id`.
     *
     * @var ?string $emailAddress
     */
    #[JsonProperty('email_address')]
    private ?string $emailAddress;

    /**
     * The phone number of the fulfillment recipient. This field is required.
     *
     * If provided, the phone number overrides the corresponding customer profile value
     * indicated by `customer_id`.
     *
     * @var ?string $phoneNumber
     */
    #[JsonProperty('phone_number')]
    private ?string $phoneNumber;

    /**
     * The address of the fulfillment recipient. This field is required.
     *
     * If provided, the address overrides the corresponding customer profile value
     * indicated by `customer_id`.
     *
     * @var ?Address $address
     */
    #[JsonProperty('address')]
    private ?Address $address;

    /**
     * @param array{
     *   customerId?: ?string,
     *   displayName?: ?string,
     *   emailAddress?: ?string,
     *   phoneNumber?: ?string,
     *   address?: ?Address,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->customerId = $values['customerId'] ?? null;
        $this->displayName = $values['displayName'] ?? null;
        $this->emailAddress = $values['emailAddress'] ?? null;
        $this->phoneNumber = $values['phoneNumber'] ?? null;
        $this->address = $values['address'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getCustomerId(): ?string
    {
        return $this->customerId;
    }

    /**
     * @param ?string $value
     */
    public function setCustomerId(?string $value = null): self
    {
        $this->customerId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getDisplayName(): ?string
    {
        return $this->displayName;
    }

    /**
     * @param ?string $value
     */
    public function setDisplayName(?string $value = null): self
    {
        $this->displayName = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getEmailAddress(): ?string
    {
        return $this->emailAddress;
    }

    /**
     * @param ?string $value
     */
    public function setEmailAddress(?string $value = null): self
    {
        $this->emailAddress = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    /**
     * @param ?string $value
     */
    public function setPhoneNumber(?string $value = null): self
    {
        $this->phoneNumber = $value;
        return $this;
    }

    /**
     * @return ?Address
     */
    public function getAddress(): ?Address
    {
        return $this->address;
    }

    /**
     * @param ?Address $value
     */
    public function setAddress(?Address $value = null): self
    {
        $this->address = $value;
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
