<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * A record representing an individual team member for a business.
 */
class TeamMember implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $id;

    /**
     * @var string|null
     */
    private $referenceId;

    /**
     * @var bool|null
     */
    private $isOwner;

    /**
     * @var string|null
     */
    private $status;

    /**
     * @var string|null
     */
    private $givenName;

    /**
     * @var string|null
     */
    private $familyName;

    /**
     * @var string|null
     */
    private $emailAddress;

    /**
     * @var string|null
     */
    private $phoneNumber;

    /**
     * @var string|null
     */
    private $createdAt;

    /**
     * @var string|null
     */
    private $updatedAt;

    /**
     * @var TeamMemberAssignedLocations|null
     */
    private $assignedLocations;

    /**
     * Returns Id.
     *
     * The unique ID for the team member.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Sets Id.
     *
     * The unique ID for the team member.
     *
     * @maps id
     */
    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    /**
     * Returns Reference Id.
     *
     * A second ID used to associate the team member with an entity in another system.
     */
    public function getReferenceId(): ?string
    {
        return $this->referenceId;
    }

    /**
     * Sets Reference Id.
     *
     * A second ID used to associate the team member with an entity in another system.
     *
     * @maps reference_id
     */
    public function setReferenceId(?string $referenceId): void
    {
        $this->referenceId = $referenceId;
    }

    /**
     * Returns Is Owner.
     *
     * Whether the team member is the owner of the Square account.
     */
    public function getIsOwner(): ?bool
    {
        return $this->isOwner;
    }

    /**
     * Sets Is Owner.
     *
     * Whether the team member is the owner of the Square account.
     *
     * @maps is_owner
     */
    public function setIsOwner(?bool $isOwner): void
    {
        $this->isOwner = $isOwner;
    }

    /**
     * Returns Status.
     *
     * Enumerates the possible statuses the team member can have within a business.
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * Sets Status.
     *
     * Enumerates the possible statuses the team member can have within a business.
     *
     * @maps status
     */
    public function setStatus(?string $status): void
    {
        $this->status = $status;
    }

    /**
     * Returns Given Name.
     *
     * The given name (that is, the first name) associated with the team member.
     */
    public function getGivenName(): ?string
    {
        return $this->givenName;
    }

    /**
     * Sets Given Name.
     *
     * The given name (that is, the first name) associated with the team member.
     *
     * @maps given_name
     */
    public function setGivenName(?string $givenName): void
    {
        $this->givenName = $givenName;
    }

    /**
     * Returns Family Name.
     *
     * The family name (that is, the last name) associated with the team member.
     */
    public function getFamilyName(): ?string
    {
        return $this->familyName;
    }

    /**
     * Sets Family Name.
     *
     * The family name (that is, the last name) associated with the team member.
     *
     * @maps family_name
     */
    public function setFamilyName(?string $familyName): void
    {
        $this->familyName = $familyName;
    }

    /**
     * Returns Email Address.
     *
     * The email address associated with the team member.
     */
    public function getEmailAddress(): ?string
    {
        return $this->emailAddress;
    }

    /**
     * Sets Email Address.
     *
     * The email address associated with the team member.
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
     * The team member's phone number, in E.164 format. For example:
     * +14155552671 - the country code is 1 for US
     * +551155256325 - the country code is 55 for BR
     */
    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    /**
     * Sets Phone Number.
     *
     * The team member's phone number, in E.164 format. For example:
     * +14155552671 - the country code is 1 for US
     * +551155256325 - the country code is 55 for BR
     *
     * @maps phone_number
     */
    public function setPhoneNumber(?string $phoneNumber): void
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * Returns Created At.
     *
     * The timestamp, in RFC 3339 format, describing when the team member was created.
     * For example, "2018-10-04T04:00:00-07:00" or "2019-02-05T12:00:00Z".
     */
    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    /**
     * Sets Created At.
     *
     * The timestamp, in RFC 3339 format, describing when the team member was created.
     * For example, "2018-10-04T04:00:00-07:00" or "2019-02-05T12:00:00Z".
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
     * The timestamp, in RFC 3339 format, describing when the team member was last updated.
     * For example, "2018-10-04T04:00:00-07:00" or "2019-02-05T12:00:00Z".
     */
    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

    /**
     * Sets Updated At.
     *
     * The timestamp, in RFC 3339 format, describing when the team member was last updated.
     * For example, "2018-10-04T04:00:00-07:00" or "2019-02-05T12:00:00Z".
     *
     * @maps updated_at
     */
    public function setUpdatedAt(?string $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * Returns Assigned Locations.
     *
     * An object that represents a team member's assignment to locations.
     */
    public function getAssignedLocations(): ?TeamMemberAssignedLocations
    {
        return $this->assignedLocations;
    }

    /**
     * Sets Assigned Locations.
     *
     * An object that represents a team member's assignment to locations.
     *
     * @maps assigned_locations
     */
    public function setAssignedLocations(?TeamMemberAssignedLocations $assignedLocations): void
    {
        $this->assignedLocations = $assignedLocations;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->id)) {
            $json['id']                 = $this->id;
        }
        if (isset($this->referenceId)) {
            $json['reference_id']       = $this->referenceId;
        }
        if (isset($this->isOwner)) {
            $json['is_owner']           = $this->isOwner;
        }
        if (isset($this->status)) {
            $json['status']             = $this->status;
        }
        if (isset($this->givenName)) {
            $json['given_name']         = $this->givenName;
        }
        if (isset($this->familyName)) {
            $json['family_name']        = $this->familyName;
        }
        if (isset($this->emailAddress)) {
            $json['email_address']      = $this->emailAddress;
        }
        if (isset($this->phoneNumber)) {
            $json['phone_number']       = $this->phoneNumber;
        }
        if (isset($this->createdAt)) {
            $json['created_at']         = $this->createdAt;
        }
        if (isset($this->updatedAt)) {
            $json['updated_at']         = $this->updatedAt;
        }
        if (isset($this->assignedLocations)) {
            $json['assigned_locations'] = $this->assignedLocations;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
