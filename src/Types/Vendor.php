<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Represents a supplier to a seller.
 */
class Vendor extends JsonSerializableType
{
    /**
     * A unique Square-generated ID for the [Vendor](entity:Vendor).
     * This field is required when attempting to update a [Vendor](entity:Vendor).
     *
     * @var ?string $id
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * An RFC 3339-formatted timestamp that indicates when the
     * [Vendor](entity:Vendor) was created.
     *
     * @var ?string $createdAt
     */
    #[JsonProperty('created_at')]
    private ?string $createdAt;

    /**
     * An RFC 3339-formatted timestamp that indicates when the
     * [Vendor](entity:Vendor) was last updated.
     *
     * @var ?string $updatedAt
     */
    #[JsonProperty('updated_at')]
    private ?string $updatedAt;

    /**
     * The name of the [Vendor](entity:Vendor).
     * This field is required when attempting to create or update a [Vendor](entity:Vendor).
     *
     * @var ?string $name
     */
    #[JsonProperty('name')]
    private ?string $name;

    /**
     * @var ?Address $address The address of the [Vendor](entity:Vendor).
     */
    #[JsonProperty('address')]
    private ?Address $address;

    /**
     * @var ?array<VendorContact> $contacts The contacts of the [Vendor](entity:Vendor).
     */
    #[JsonProperty('contacts'), ArrayType([VendorContact::class])]
    private ?array $contacts;

    /**
     * @var ?string $accountNumber The account number of the [Vendor](entity:Vendor).
     */
    #[JsonProperty('account_number')]
    private ?string $accountNumber;

    /**
     * @var ?string $note A note detailing information about the [Vendor](entity:Vendor).
     */
    #[JsonProperty('note')]
    private ?string $note;

    /**
     * @var ?int $version The version of the [Vendor](entity:Vendor).
     */
    #[JsonProperty('version')]
    private ?int $version;

    /**
     * The status of the [Vendor](entity:Vendor).
     * See [Status](#type-status) for possible values
     *
     * @var ?value-of<VendorStatus> $status
     */
    #[JsonProperty('status')]
    private ?string $status;

    /**
     * @param array{
     *   id?: ?string,
     *   createdAt?: ?string,
     *   updatedAt?: ?string,
     *   name?: ?string,
     *   address?: ?Address,
     *   contacts?: ?array<VendorContact>,
     *   accountNumber?: ?string,
     *   note?: ?string,
     *   version?: ?int,
     *   status?: ?value-of<VendorStatus>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->address = $values['address'] ?? null;
        $this->contacts = $values['contacts'] ?? null;
        $this->accountNumber = $values['accountNumber'] ?? null;
        $this->note = $values['note'] ?? null;
        $this->version = $values['version'] ?? null;
        $this->status = $values['status'] ?? null;
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
    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    /**
     * @param ?string $value
     */
    public function setCreatedAt(?string $value = null): self
    {
        $this->createdAt = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

    /**
     * @param ?string $value
     */
    public function setUpdatedAt(?string $value = null): self
    {
        $this->updatedAt = $value;
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
     * @return ?array<VendorContact>
     */
    public function getContacts(): ?array
    {
        return $this->contacts;
    }

    /**
     * @param ?array<VendorContact> $value
     */
    public function setContacts(?array $value = null): self
    {
        $this->contacts = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getAccountNumber(): ?string
    {
        return $this->accountNumber;
    }

    /**
     * @param ?string $value
     */
    public function setAccountNumber(?string $value = null): self
    {
        $this->accountNumber = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getNote(): ?string
    {
        return $this->note;
    }

    /**
     * @param ?string $value
     */
    public function setNote(?string $value = null): self
    {
        $this->note = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getVersion(): ?int
    {
        return $this->version;
    }

    /**
     * @param ?int $value
     */
    public function setVersion(?int $value = null): self
    {
        $this->version = $value;
        return $this;
    }

    /**
     * @return ?value-of<VendorStatus>
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param ?value-of<VendorStatus> $value
     */
    public function setStatus(?string $value = null): self
    {
        $this->status = $value;
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
