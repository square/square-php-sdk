<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * The booking profile of a seller's team member, including the team member's ID, display name, description and whether the team member can be booked as a service provider.
 */
class TeamMemberBookingProfile extends JsonSerializableType
{
    /**
     * @var ?string $teamMemberId The ID of the [TeamMember](entity:TeamMember) object for the team member associated with the booking profile.
     */
    #[JsonProperty('team_member_id')]
    private ?string $teamMemberId;

    /**
     * @var ?string $description The description of the team member.
     */
    #[JsonProperty('description')]
    private ?string $description;

    /**
     * @var ?string $displayName The display name of the team member.
     */
    #[JsonProperty('display_name')]
    private ?string $displayName;

    /**
     * @var ?bool $isBookable Indicates whether the team member can be booked through the Bookings API or the seller's online booking channel or site (`true`) or not (`false`).
     */
    #[JsonProperty('is_bookable')]
    private ?bool $isBookable;

    /**
     * @var ?string $profileImageUrl The URL of the team member's image for the bookings profile.
     */
    #[JsonProperty('profile_image_url')]
    private ?string $profileImageUrl;

    /**
     * @param array{
     *   teamMemberId?: ?string,
     *   description?: ?string,
     *   displayName?: ?string,
     *   isBookable?: ?bool,
     *   profileImageUrl?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->teamMemberId = $values['teamMemberId'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->displayName = $values['displayName'] ?? null;
        $this->isBookable = $values['isBookable'] ?? null;
        $this->profileImageUrl = $values['profileImageUrl'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getTeamMemberId(): ?string
    {
        return $this->teamMemberId;
    }

    /**
     * @param ?string $value
     */
    public function setTeamMemberId(?string $value = null): self
    {
        $this->teamMemberId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param ?string $value
     */
    public function setDescription(?string $value = null): self
    {
        $this->description = $value;
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
     * @return ?bool
     */
    public function getIsBookable(): ?bool
    {
        return $this->isBookable;
    }

    /**
     * @param ?bool $value
     */
    public function setIsBookable(?bool $value = null): self
    {
        $this->isBookable = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getProfileImageUrl(): ?string
    {
        return $this->profileImageUrl;
    }

    /**
     * @param ?string $value
     */
    public function setProfileImageUrl(?string $value = null): self
    {
        $this->profileImageUrl = $value;
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
