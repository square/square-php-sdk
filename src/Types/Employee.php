<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * An employee object that is used by the external API.
 *
 * DEPRECATED at version 2020-08-26. Replaced by [TeamMember](entity:TeamMember).
 */
class Employee extends JsonSerializableType
{
    /**
     * @var ?string $id UUID for this object.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?string $firstName The employee's first name.
     */
    #[JsonProperty('first_name')]
    private ?string $firstName;

    /**
     * @var ?string $lastName The employee's last name.
     */
    #[JsonProperty('last_name')]
    private ?string $lastName;

    /**
     * @var ?string $email The employee's email address
     */
    #[JsonProperty('email')]
    private ?string $email;

    /**
     * @var ?string $phoneNumber The employee's phone number in E.164 format, i.e. "+12125554250"
     */
    #[JsonProperty('phone_number')]
    private ?string $phoneNumber;

    /**
     * @var ?array<string> $locationIds A list of location IDs where this employee has access to.
     */
    #[JsonProperty('location_ids'), ArrayType(['string'])]
    private ?array $locationIds;

    /**
     * Specifies the status of the employees being fetched.
     * See [EmployeeStatus](#type-employeestatus) for possible values
     *
     * @var ?value-of<EmployeeStatus> $status
     */
    #[JsonProperty('status')]
    private ?string $status;

    /**
     * Whether this employee is the owner of the merchant. Each merchant
     * has one owner employee, and that employee has full authority over
     * the account.
     *
     * @var ?bool $isOwner
     */
    #[JsonProperty('is_owner')]
    private ?bool $isOwner;

    /**
     * @var ?string $createdAt A read-only timestamp in RFC 3339 format.
     */
    #[JsonProperty('created_at')]
    private ?string $createdAt;

    /**
     * @var ?string $updatedAt A read-only timestamp in RFC 3339 format.
     */
    #[JsonProperty('updated_at')]
    private ?string $updatedAt;

    /**
     * @param array{
     *   id?: ?string,
     *   firstName?: ?string,
     *   lastName?: ?string,
     *   email?: ?string,
     *   phoneNumber?: ?string,
     *   locationIds?: ?array<string>,
     *   status?: ?value-of<EmployeeStatus>,
     *   isOwner?: ?bool,
     *   createdAt?: ?string,
     *   updatedAt?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->firstName = $values['firstName'] ?? null;
        $this->lastName = $values['lastName'] ?? null;
        $this->email = $values['email'] ?? null;
        $this->phoneNumber = $values['phoneNumber'] ?? null;
        $this->locationIds = $values['locationIds'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->isOwner = $values['isOwner'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
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
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * @param ?string $value
     */
    public function setFirstName(?string $value = null): self
    {
        $this->firstName = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @param ?string $value
     */
    public function setLastName(?string $value = null): self
    {
        $this->lastName = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param ?string $value
     */
    public function setEmail(?string $value = null): self
    {
        $this->email = $value;
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
     * @return ?array<string>
     */
    public function getLocationIds(): ?array
    {
        return $this->locationIds;
    }

    /**
     * @param ?array<string> $value
     */
    public function setLocationIds(?array $value = null): self
    {
        $this->locationIds = $value;
        return $this;
    }

    /**
     * @return ?value-of<EmployeeStatus>
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param ?value-of<EmployeeStatus> $value
     */
    public function setStatus(?string $value = null): self
    {
        $this->status = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getIsOwner(): ?bool
    {
        return $this->isOwner;
    }

    /**
     * @param ?bool $value
     */
    public function setIsOwner(?bool $value = null): self
    {
        $this->isOwner = $value;
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
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
