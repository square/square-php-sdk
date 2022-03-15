<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

/**
 * Represents a supplier to a seller.
 */
class Vendor implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $id;

    /**
     * @var string|null
     */
    private $createdAt;

    /**
     * @var string|null
     */
    private $updatedAt;

    /**
     * @var string|null
     */
    private $name;

    /**
     * @var Address|null
     */
    private $address;

    /**
     * @var VendorContact[]|null
     */
    private $contacts;

    /**
     * @var string|null
     */
    private $accountNumber;

    /**
     * @var string|null
     */
    private $note;

    /**
     * @var int|null
     */
    private $version;

    /**
     * @var string|null
     */
    private $status;

    /**
     * Returns Id.
     *
     * A unique Square-generated ID for the [Vendor]($m/Vendor).
     * This field is required when attempting to update a [Vendor]($m/Vendor).
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Sets Id.
     *
     * A unique Square-generated ID for the [Vendor]($m/Vendor).
     * This field is required when attempting to update a [Vendor]($m/Vendor).
     *
     * @maps id
     */
    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    /**
     * Returns Created At.
     *
     * An RFC 3339-formatted timestamp that indicates when the
     * [Vendor]($m/Vendor) was created.
     */
    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    /**
     * Sets Created At.
     *
     * An RFC 3339-formatted timestamp that indicates when the
     * [Vendor]($m/Vendor) was created.
     *
     * @maps created_at
     */
    public function setCreatedAt(?string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Returns Updated At.
     *
     * An RFC 3339-formatted timestamp that indicates when the
     * [Vendor]($m/Vendor) was last updated.
     */
    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

    /**
     * Sets Updated At.
     *
     * An RFC 3339-formatted timestamp that indicates when the
     * [Vendor]($m/Vendor) was last updated.
     *
     * @maps updated_at
     */
    public function setUpdatedAt(?string $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * Returns Name.
     *
     * The name of the [Vendor]($m/Vendor).
     * This field is required when attempting to create or update a [Vendor]($m/Vendor).
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Sets Name.
     *
     * The name of the [Vendor]($m/Vendor).
     * This field is required when attempting to create or update a [Vendor]($m/Vendor).
     *
     * @maps name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * Returns Address.
     *
     * Represents a postal address in a country.
     * For more information, see [Working with Addresses](https://developer.squareup.com/docs/build-
     * basics/working-with-addresses).
     */
    public function getAddress(): ?Address
    {
        return $this->address;
    }

    /**
     * Sets Address.
     *
     * Represents a postal address in a country.
     * For more information, see [Working with Addresses](https://developer.squareup.com/docs/build-
     * basics/working-with-addresses).
     *
     * @maps address
     */
    public function setAddress(?Address $address): void
    {
        $this->address = $address;
    }

    /**
     * Returns Contacts.
     *
     * The contacts of the [Vendor]($m/Vendor).
     *
     * @return VendorContact[]|null
     */
    public function getContacts(): ?array
    {
        return $this->contacts;
    }

    /**
     * Sets Contacts.
     *
     * The contacts of the [Vendor]($m/Vendor).
     *
     * @maps contacts
     *
     * @param VendorContact[]|null $contacts
     */
    public function setContacts(?array $contacts): void
    {
        $this->contacts = $contacts;
    }

    /**
     * Returns Account Number.
     *
     * The account number of the [Vendor]($m/Vendor).
     */
    public function getAccountNumber(): ?string
    {
        return $this->accountNumber;
    }

    /**
     * Sets Account Number.
     *
     * The account number of the [Vendor]($m/Vendor).
     *
     * @maps account_number
     */
    public function setAccountNumber(?string $accountNumber): void
    {
        $this->accountNumber = $accountNumber;
    }

    /**
     * Returns Note.
     *
     * A note detailing information about the [Vendor]($m/Vendor).
     */
    public function getNote(): ?string
    {
        return $this->note;
    }

    /**
     * Sets Note.
     *
     * A note detailing information about the [Vendor]($m/Vendor).
     *
     * @maps note
     */
    public function setNote(?string $note): void
    {
        $this->note = $note;
    }

    /**
     * Returns Version.
     *
     * The version of the [Vendor]($m/Vendor).
     */
    public function getVersion(): ?int
    {
        return $this->version;
    }

    /**
     * Sets Version.
     *
     * The version of the [Vendor]($m/Vendor).
     *
     * @maps version
     */
    public function setVersion(?int $version): void
    {
        $this->version = $version;
    }

    /**
     * Returns Status.
     *
     * The status of the [Vendor]($m/Vendor),
     * whether a [Vendor]($m/Vendor) is active or inactive.
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * Sets Status.
     *
     * The status of the [Vendor]($m/Vendor),
     * whether a [Vendor]($m/Vendor) is active or inactive.
     *
     * @maps status
     */
    public function setStatus(?string $status): void
    {
        $this->status = $status;
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
            $json['id']             = $this->id;
        }
        if (isset($this->createdAt)) {
            $json['created_at']     = $this->createdAt;
        }
        if (isset($this->updatedAt)) {
            $json['updated_at']     = $this->updatedAt;
        }
        if (isset($this->name)) {
            $json['name']           = $this->name;
        }
        if (isset($this->address)) {
            $json['address']        = $this->address;
        }
        if (isset($this->contacts)) {
            $json['contacts']       = $this->contacts;
        }
        if (isset($this->accountNumber)) {
            $json['account_number'] = $this->accountNumber;
        }
        if (isset($this->note)) {
            $json['note']           = $this->note;
        }
        if (isset($this->version)) {
            $json['version']        = $this->version;
        }
        if (isset($this->status)) {
            $json['status']         = $this->status;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
