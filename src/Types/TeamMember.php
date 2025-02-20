<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * A record representing an individual team member for a business.
 */
class TeamMember extends JsonSerializableType
{
    /**
     * @var ?string $id The unique ID for the team member.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?string $referenceId A second ID used to associate the team member with an entity in another system.
     */
    #[JsonProperty('reference_id')]
    private ?string $referenceId;

    /**
     * @var ?bool $isOwner Whether the team member is the owner of the Square account.
     */
    #[JsonProperty('is_owner')]
    private ?bool $isOwner;

    /**
     * Describes the status of the team member.
     * See [TeamMemberStatus](#type-teammemberstatus) for possible values
     *
     * @var ?value-of<TeamMemberStatus> $status
     */
    #[JsonProperty('status')]
    private ?string $status;

    /**
     * @var ?string $givenName The given name (that is, the first name) associated with the team member.
     */
    #[JsonProperty('given_name')]
    private ?string $givenName;

    /**
     * @var ?string $familyName The family name (that is, the last name) associated with the team member.
     */
    #[JsonProperty('family_name')]
    private ?string $familyName;

    /**
     * The email address associated with the team member. After accepting the invitation
     * from Square, only the team member can change this value.
     *
     * @var ?string $emailAddress
     */
    #[JsonProperty('email_address')]
    private ?string $emailAddress;

    /**
     * The team member's phone number, in E.164 format. For example:
     * +14155552671 - the country code is 1 for US
     * +551155256325 - the country code is 55 for BR
     *
     * @var ?string $phoneNumber
     */
    #[JsonProperty('phone_number')]
    private ?string $phoneNumber;

    /**
     * @var ?string $createdAt The timestamp when the team member was created, in RFC 3339 format.
     */
    #[JsonProperty('created_at')]
    private ?string $createdAt;

    /**
     * @var ?string $updatedAt The timestamp when the team member was last updated, in RFC 3339 format.
     */
    #[JsonProperty('updated_at')]
    private ?string $updatedAt;

    /**
     * @var ?TeamMemberAssignedLocations $assignedLocations Describes the team member's assigned locations.
     */
    #[JsonProperty('assigned_locations')]
    private ?TeamMemberAssignedLocations $assignedLocations;

    /**
     * @var ?WageSetting $wageSetting Information about the team member's overtime exemption status, job assignments, and compensation.
     */
    #[JsonProperty('wage_setting')]
    private ?WageSetting $wageSetting;

    /**
     * @param array{
     *   id?: ?string,
     *   referenceId?: ?string,
     *   isOwner?: ?bool,
     *   status?: ?value-of<TeamMemberStatus>,
     *   givenName?: ?string,
     *   familyName?: ?string,
     *   emailAddress?: ?string,
     *   phoneNumber?: ?string,
     *   createdAt?: ?string,
     *   updatedAt?: ?string,
     *   assignedLocations?: ?TeamMemberAssignedLocations,
     *   wageSetting?: ?WageSetting,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->referenceId = $values['referenceId'] ?? null;
        $this->isOwner = $values['isOwner'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->givenName = $values['givenName'] ?? null;
        $this->familyName = $values['familyName'] ?? null;
        $this->emailAddress = $values['emailAddress'] ?? null;
        $this->phoneNumber = $values['phoneNumber'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
        $this->assignedLocations = $values['assignedLocations'] ?? null;
        $this->wageSetting = $values['wageSetting'] ?? null;
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
    public function getReferenceId(): ?string
    {
        return $this->referenceId;
    }

    /**
     * @param ?string $value
     */
    public function setReferenceId(?string $value = null): self
    {
        $this->referenceId = $value;
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
     * @return ?value-of<TeamMemberStatus>
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param ?value-of<TeamMemberStatus> $value
     */
    public function setStatus(?string $value = null): self
    {
        $this->status = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getGivenName(): ?string
    {
        return $this->givenName;
    }

    /**
     * @param ?string $value
     */
    public function setGivenName(?string $value = null): self
    {
        $this->givenName = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getFamilyName(): ?string
    {
        return $this->familyName;
    }

    /**
     * @param ?string $value
     */
    public function setFamilyName(?string $value = null): self
    {
        $this->familyName = $value;
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
     * @return ?TeamMemberAssignedLocations
     */
    public function getAssignedLocations(): ?TeamMemberAssignedLocations
    {
        return $this->assignedLocations;
    }

    /**
     * @param ?TeamMemberAssignedLocations $value
     */
    public function setAssignedLocations(?TeamMemberAssignedLocations $value = null): self
    {
        $this->assignedLocations = $value;
        return $this;
    }

    /**
     * @return ?WageSetting
     */
    public function getWageSetting(): ?WageSetting
    {
        return $this->wageSetting;
    }

    /**
     * @param ?WageSetting $value
     */
    public function setWageSetting(?WageSetting $value = null): self
    {
        $this->wageSetting = $value;
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
