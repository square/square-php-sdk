<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents a contact of a [Vendor](entity:Vendor).
 */
class VendorContact extends JsonSerializableType
{
    /**
     * A unique Square-generated ID for the [VendorContact](entity:VendorContact).
     * This field is required when attempting to update a [VendorContact](entity:VendorContact).
     *
     * @var ?string $id
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * The name of the [VendorContact](entity:VendorContact).
     * This field is required when attempting to create a [Vendor](entity:Vendor).
     *
     * @var ?string $name
     */
    #[JsonProperty('name')]
    private ?string $name;

    /**
     * @var ?string $emailAddress The email address of the [VendorContact](entity:VendorContact).
     */
    #[JsonProperty('email_address')]
    private ?string $emailAddress;

    /**
     * @var ?string $phoneNumber The phone number of the [VendorContact](entity:VendorContact).
     */
    #[JsonProperty('phone_number')]
    private ?string $phoneNumber;

    /**
     * @var ?bool $removed The state of the [VendorContact](entity:VendorContact).
     */
    #[JsonProperty('removed')]
    private ?bool $removed;

    /**
     * @var int $ordinal The ordinal of the [VendorContact](entity:VendorContact).
     */
    #[JsonProperty('ordinal')]
    private int $ordinal;

    /**
     * @param array{
     *   ordinal: int,
     *   id?: ?string,
     *   name?: ?string,
     *   emailAddress?: ?string,
     *   phoneNumber?: ?string,
     *   removed?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->emailAddress = $values['emailAddress'] ?? null;
        $this->phoneNumber = $values['phoneNumber'] ?? null;
        $this->removed = $values['removed'] ?? null;
        $this->ordinal = $values['ordinal'];
    }

    /**
     * @return ?string
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param ?string $value
     */
    public function setId(?string $value = null): self
    {
        $this->id = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param ?string $value
     */
    public function setName(?string $value = null): self
    {
        $this->name = $value;
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
     * @return ?bool
     */
    public function getRemoved(): ?bool
    {
        return $this->removed;
    }

    /**
     * @param ?bool $value
     */
    public function setRemoved(?bool $value = null): self
    {
        $this->removed = $value;
        return $this;
    }

    /**
     * @return int
     */
    public function getOrdinal(): int
    {
        return $this->ordinal;
    }

    /**
     * @param int $value
     */
    public function setOrdinal(int $value): self
    {
        $this->ordinal = $value;
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
