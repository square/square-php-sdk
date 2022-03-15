<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

/**
 * Represents a contact of a [Vendor]($m/Vendor).
 */
class VendorContact implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $id;

    /**
     * @var string|null
     */
    private $name;

    /**
     * @var string|null
     */
    private $emailAddress;

    /**
     * @var string|null
     */
    private $phoneNumber;

    /**
     * @var bool|null
     */
    private $removed;

    /**
     * @var int
     */
    private $ordinal;

    /**
     * @param int $ordinal
     */
    public function __construct(int $ordinal)
    {
        $this->ordinal = $ordinal;
    }

    /**
     * Returns Id.
     *
     * A unique Square-generated ID for the [VendorContact]($m/VendorContact).
     * This field is required when attempting to update a [VendorContact]($m/VendorContact).
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Sets Id.
     *
     * A unique Square-generated ID for the [VendorContact]($m/VendorContact).
     * This field is required when attempting to update a [VendorContact]($m/VendorContact).
     *
     * @maps id
     */
    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    /**
     * Returns Name.
     *
     * The name of the [VendorContact]($m/VendorContact).
     * This field is required when attempting to create a [Vendor]($m/Vendor).
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Sets Name.
     *
     * The name of the [VendorContact]($m/VendorContact).
     * This field is required when attempting to create a [Vendor]($m/Vendor).
     *
     * @maps name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * Returns Email Address.
     *
     * The email address of the [VendorContact]($m/VendorContact).
     */
    public function getEmailAddress(): ?string
    {
        return $this->emailAddress;
    }

    /**
     * Sets Email Address.
     *
     * The email address of the [VendorContact]($m/VendorContact).
     *
     * @maps email_address
     */
    public function setEmailAddress(?string $emailAddress): void
    {
        $this->emailAddress = $emailAddress;
    }

    /**
     * Returns Phone Number.
     *
     * The phone number of the [VendorContact]($m/VendorContact).
     */
    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    /**
     * Sets Phone Number.
     *
     * The phone number of the [VendorContact]($m/VendorContact).
     *
     * @maps phone_number
     */
    public function setPhoneNumber(?string $phoneNumber): void
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * Returns Removed.
     *
     * The state of the [VendorContact]($m/VendorContact).
     */
    public function getRemoved(): ?bool
    {
        return $this->removed;
    }

    /**
     * Sets Removed.
     *
     * The state of the [VendorContact]($m/VendorContact).
     *
     * @maps removed
     */
    public function setRemoved(?bool $removed): void
    {
        $this->removed = $removed;
    }

    /**
     * Returns Ordinal.
     *
     * The ordinal of the [VendorContact]($m/VendorContact).
     */
    public function getOrdinal(): int
    {
        return $this->ordinal;
    }

    /**
     * Sets Ordinal.
     *
     * The ordinal of the [VendorContact]($m/VendorContact).
     *
     * @required
     * @maps ordinal
     */
    public function setOrdinal(int $ordinal): void
    {
        $this->ordinal = $ordinal;
    }

    /**
     * Encode this object to JSON
     *
     * @param bool $asArrayWhenEmpty Whether to serialize this model as an array whenever no fields
     *        are set. (default: false)
     *
     * @return array|stdClass
     */
    #[\ReturnTypeWillChange] // @phan-suppress-current-line PhanUndeclaredClassAttribute for (php < 8.1)
    public function jsonSerialize(bool $asArrayWhenEmpty = false)
    {
        $json = [];
        if (isset($this->id)) {
            $json['id']            = $this->id;
        }
        if (isset($this->name)) {
            $json['name']          = $this->name;
        }
        if (isset($this->emailAddress)) {
            $json['email_address'] = $this->emailAddress;
        }
        if (isset($this->phoneNumber)) {
            $json['phone_number']  = $this->phoneNumber;
        }
        if (isset($this->removed)) {
            $json['removed']       = $this->removed;
        }
        $json['ordinal']           = $this->ordinal;
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
