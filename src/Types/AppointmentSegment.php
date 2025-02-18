<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Defines an appointment segment of a booking.
 */
class AppointmentSegment extends JsonSerializableType
{
    /**
     * @var ?int $durationMinutes The time span in minutes of an appointment segment.
     */
    #[JsonProperty('duration_minutes')]
    private ?int $durationMinutes;

    /**
     * @var ?string $serviceVariationId The ID of the [CatalogItemVariation](entity:CatalogItemVariation) object representing the service booked in this segment.
     */
    #[JsonProperty('service_variation_id')]
    private ?string $serviceVariationId;

    /**
     * @var string $teamMemberId The ID of the [TeamMember](entity:TeamMember) object representing the team member booked in this segment.
     */
    #[JsonProperty('team_member_id')]
    private string $teamMemberId;

    /**
     * @var ?int $serviceVariationVersion The current version of the item variation representing the service booked in this segment.
     */
    #[JsonProperty('service_variation_version')]
    private ?int $serviceVariationVersion;

    /**
     * @var ?int $intermissionMinutes Time between the end of this segment and the beginning of the subsequent segment.
     */
    #[JsonProperty('intermission_minutes')]
    private ?int $intermissionMinutes;

    /**
     * @var ?bool $anyTeamMember Whether the customer accepts any team member, instead of a specific one, to serve this segment.
     */
    #[JsonProperty('any_team_member')]
    private ?bool $anyTeamMember;

    /**
     * @var ?array<string> $resourceIds The IDs of the seller-accessible resources used for this appointment segment.
     */
    #[JsonProperty('resource_ids'), ArrayType(['string'])]
    private ?array $resourceIds;

    /**
     * @param array{
     *   teamMemberId: string,
     *   durationMinutes?: ?int,
     *   serviceVariationId?: ?string,
     *   serviceVariationVersion?: ?int,
     *   intermissionMinutes?: ?int,
     *   anyTeamMember?: ?bool,
     *   resourceIds?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->durationMinutes = $values['durationMinutes'] ?? null;
        $this->serviceVariationId = $values['serviceVariationId'] ?? null;
        $this->teamMemberId = $values['teamMemberId'];
        $this->serviceVariationVersion = $values['serviceVariationVersion'] ?? null;
        $this->intermissionMinutes = $values['intermissionMinutes'] ?? null;
        $this->anyTeamMember = $values['anyTeamMember'] ?? null;
        $this->resourceIds = $values['resourceIds'] ?? null;
    }

    /**
     * @return ?int
     */
    public function getDurationMinutes(): ?int
    {
        return $this->durationMinutes;
    }

    /**
     * @param ?int $value
     */
    public function setDurationMinutes(?int $value = null): self
    {
        $this->durationMinutes = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getServiceVariationId(): ?string
    {
        return $this->serviceVariationId;
    }

    /**
     * @param ?string $value
     */
    public function setServiceVariationId(?string $value = null): self
    {
        $this->serviceVariationId = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getTeamMemberId(): string
    {
        return $this->teamMemberId;
    }

    /**
     * @param string $value
     */
    public function setTeamMemberId(string $value): self
    {
        $this->teamMemberId = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getServiceVariationVersion(): ?int
    {
        return $this->serviceVariationVersion;
    }

    /**
     * @param ?int $value
     */
    public function setServiceVariationVersion(?int $value = null): self
    {
        $this->serviceVariationVersion = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getIntermissionMinutes(): ?int
    {
        return $this->intermissionMinutes;
    }

    /**
     * @param ?int $value
     */
    public function setIntermissionMinutes(?int $value = null): self
    {
        $this->intermissionMinutes = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getAnyTeamMember(): ?bool
    {
        return $this->anyTeamMember;
    }

    /**
     * @param ?bool $value
     */
    public function setAnyTeamMember(?bool $value = null): self
    {
        $this->anyTeamMember = $value;
        return $this;
    }

    /**
     * @return ?array<string>
     */
    public function getResourceIds(): ?array
    {
        return $this->resourceIds;
    }

    /**
     * @param ?array<string> $value
     */
    public function setResourceIds(?array $value = null): self
    {
        $this->resourceIds = $value;
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
