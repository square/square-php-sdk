<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * A query filter to search for appointment segments by.
 */
class SegmentFilter implements \JsonSerializable
{
    /**
     * @var string
     */
    private $serviceVariationId;

    /**
     * @var FilterValue|null
     */
    private $teamMemberIdFilter;

    /**
     * @param string $serviceVariationId
     */
    public function __construct(string $serviceVariationId)
    {
        $this->serviceVariationId = $serviceVariationId;
    }

    /**
     * Returns Service Variation Id.
     *
     * The ID of the [CatalogItemVariation]($m/CatalogItemVariation) representing the service booked in
     * this segment.
     */
    public function getServiceVariationId(): string
    {
        return $this->serviceVariationId;
    }

    /**
     * Sets Service Variation Id.
     *
     * The ID of the [CatalogItemVariation]($m/CatalogItemVariation) representing the service booked in
     * this segment.
     *
     * @required
     * @maps service_variation_id
     */
    public function setServiceVariationId(string $serviceVariationId): void
    {
        $this->serviceVariationId = $serviceVariationId;
    }

    /**
     * Returns Team Member Id Filter.
     *
     * A filter to select resources based on an exact field value. For any given
     * value, the value can only be in one property. Depending on the field, either
     * all properties can be set or only a subset will be available.
     *
     * Refer to the documentation of the field.
     */
    public function getTeamMemberIdFilter(): ?FilterValue
    {
        return $this->teamMemberIdFilter;
    }

    /**
     * Sets Team Member Id Filter.
     *
     * A filter to select resources based on an exact field value. For any given
     * value, the value can only be in one property. Depending on the field, either
     * all properties can be set or only a subset will be available.
     *
     * Refer to the documentation of the field.
     *
     * @maps team_member_id_filter
     */
    public function setTeamMemberIdFilter(?FilterValue $teamMemberIdFilter): void
    {
        $this->teamMemberIdFilter = $teamMemberIdFilter;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['service_variation_id']      = $this->serviceVariationId;
        if (isset($this->teamMemberIdFilter)) {
            $json['team_member_id_filter'] = $this->teamMemberIdFilter;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
