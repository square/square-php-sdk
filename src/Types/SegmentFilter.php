<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * A query filter to search for buyer-accessible appointment segments by.
 */
class SegmentFilter extends JsonSerializableType
{
    /**
     * @var string $serviceVariationId The ID of the [CatalogItemVariation](entity:CatalogItemVariation) object representing the service booked in this segment.
     */
    #[JsonProperty('service_variation_id')]
    private string $serviceVariationId;

    /**
     * A query filter to search for buyer-accessible appointment segments with service-providing team members matching the specified list of team member IDs.  Supported query expressions are
     * - `ANY`: return the appointment segments with team members whose IDs match any member in this list.
     * - `NONE`: return the appointment segments with team members whose IDs are not in this list.
     * - `ALL`: not supported.
     *
     * When no expression is specified, any service-providing team member is eligible to fulfill the Booking.
     *
     * @var ?FilterValue $teamMemberIdFilter
     */
    #[JsonProperty('team_member_id_filter')]
    private ?FilterValue $teamMemberIdFilter;

    /**
     * @param array{
     *   serviceVariationId: string,
     *   teamMemberIdFilter?: ?FilterValue,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->serviceVariationId = $values['serviceVariationId'];
        $this->teamMemberIdFilter = $values['teamMemberIdFilter'] ?? null;
    }

    /**
     * @return string
     */
    public function getServiceVariationId(): string
    {
        return $this->serviceVariationId;
    }

    /**
     * @param string $value
     */
    public function setServiceVariationId(string $value): self
    {
        $this->serviceVariationId = $value;
        return $this;
    }

    /**
     * @return ?FilterValue
     */
    public function getTeamMemberIdFilter(): ?FilterValue
    {
        return $this->teamMemberIdFilter;
    }

    /**
     * @param ?FilterValue $value
     */
    public function setTeamMemberIdFilter(?FilterValue $value = null): self
    {
        $this->teamMemberIdFilter = $value;
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
