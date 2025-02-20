<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * A query filter to search for buyer-accessible availabilities by.
 */
class SearchAvailabilityFilter extends JsonSerializableType
{
    /**
     * The query expression to search for buy-accessible availabilities with their starting times falling within the specified time range.
     * The time range must be at least 24 hours and at most 32 days long.
     * For waitlist availabilities, the time range can be 0 or more up to 367 days long.
     *
     * @var TimeRange $startAtRange
     */
    #[JsonProperty('start_at_range')]
    private TimeRange $startAtRange;

    /**
     * The query expression to search for buyer-accessible availabilities with their location IDs matching the specified location ID.
     * This query expression cannot be set if `booking_id` is set.
     *
     * @var ?string $locationId
     */
    #[JsonProperty('location_id')]
    private ?string $locationId;

    /**
     * The query expression to search for buyer-accessible availabilities matching the specified list of segment filters.
     * If the size of the `segment_filters` list is `n`, the search returns availabilities with `n` segments per availability.
     *
     * This query expression cannot be set if `booking_id` is set.
     *
     * @var ?array<SegmentFilter> $segmentFilters
     */
    #[JsonProperty('segment_filters'), ArrayType([SegmentFilter::class])]
    private ?array $segmentFilters;

    /**
     * The query expression to search for buyer-accessible availabilities for an existing booking by matching the specified `booking_id` value.
     * This is commonly used to reschedule an appointment.
     * If this expression is set, the `location_id` and `segment_filters` expressions cannot be set.
     *
     * @var ?string $bookingId
     */
    #[JsonProperty('booking_id')]
    private ?string $bookingId;

    /**
     * @param array{
     *   startAtRange: TimeRange,
     *   locationId?: ?string,
     *   segmentFilters?: ?array<SegmentFilter>,
     *   bookingId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->startAtRange = $values['startAtRange'];
        $this->locationId = $values['locationId'] ?? null;
        $this->segmentFilters = $values['segmentFilters'] ?? null;
        $this->bookingId = $values['bookingId'] ?? null;
    }

    /**
     * @return TimeRange
     */
    public function getStartAtRange(): TimeRange
    {
        return $this->startAtRange;
    }

    /**
     * @param TimeRange $value
     */
    public function setStartAtRange(TimeRange $value): self
    {
        $this->startAtRange = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getLocationId(): ?string
    {
        return $this->locationId;
    }

    /**
     * @param ?string $value
     */
    public function setLocationId(?string $value = null): self
    {
        $this->locationId = $value;
        return $this;
    }

    /**
     * @return ?array<SegmentFilter>
     */
    public function getSegmentFilters(): ?array
    {
        return $this->segmentFilters;
    }

    /**
     * @param ?array<SegmentFilter> $value
     */
    public function setSegmentFilters(?array $value = null): self
    {
        $this->segmentFilters = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getBookingId(): ?string
    {
        return $this->bookingId;
    }

    /**
     * @param ?string $value
     */
    public function setBookingId(?string $value = null): self
    {
        $this->bookingId = $value;
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
