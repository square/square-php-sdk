<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Information about a booking creator.
 */
class BookingCreatorDetails extends JsonSerializableType
{
    /**
     * The seller-accessible type of the creator of the booking.
     * See [BookingCreatorDetailsCreatorType](#type-bookingcreatordetailscreatortype) for possible values
     *
     * @var ?value-of<BookingCreatorDetailsCreatorType> $creatorType
     */
    #[JsonProperty('creator_type')]
    private ?string $creatorType;

    /**
     * The ID of the team member who created the booking, when the booking creator is of the `TEAM_MEMBER` type.
     * Access to this field requires seller-level permissions.
     *
     * @var ?string $teamMemberId
     */
    #[JsonProperty('team_member_id')]
    private ?string $teamMemberId;

    /**
     * The ID of the customer who created the booking, when the booking creator is of the `CUSTOMER` type.
     * Access to this field requires seller-level permissions.
     *
     * @var ?string $customerId
     */
    #[JsonProperty('customer_id')]
    private ?string $customerId;

    /**
     * @param array{
     *   creatorType?: ?value-of<BookingCreatorDetailsCreatorType>,
     *   teamMemberId?: ?string,
     *   customerId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->creatorType = $values['creatorType'] ?? null;
        $this->teamMemberId = $values['teamMemberId'] ?? null;
        $this->customerId = $values['customerId'] ?? null;
    }

    /**
     * @return ?value-of<BookingCreatorDetailsCreatorType>
     */
    public function getCreatorType(): ?string
    {
        return $this->creatorType;
    }

    /**
     * @param ?value-of<BookingCreatorDetailsCreatorType> $value
     */
    public function setCreatorType(?string $value = null): self
    {
        $this->creatorType = $value;
        return $this;
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
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
