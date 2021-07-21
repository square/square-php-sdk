<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * A query filter to search for availabilities by.
 */
class SearchAvailabilityFilter implements \JsonSerializable
{
    /**
     * @var TimeRange
     */
    private $startAtRange;

    /**
     * @var string|null
     */
    private $locationId;

    /**
     * @var SegmentFilter[]|null
     */
    private $segmentFilters;

    /**
     * @var string|null
     */
    private $bookingId;

    /**
     * @param TimeRange $startAtRange
     */
    public function __construct(TimeRange $startAtRange)
    {
        $this->startAtRange = $startAtRange;
    }

    /**
     * Returns Start at Range.
     *
     * Represents a generic time range. The start and end values are
     * represented in RFC 3339 format. Time ranges are customized to be
     * inclusive or exclusive based on the needs of a particular endpoint.
     * Refer to the relevant endpoint-specific documentation to determine
     * how time ranges are handled.
     */
    public function getStartAtRange(): TimeRange
    {
        return $this->startAtRange;
    }

    /**
     * Sets Start at Range.
     *
     * Represents a generic time range. The start and end values are
     * represented in RFC 3339 format. Time ranges are customized to be
     * inclusive or exclusive based on the needs of a particular endpoint.
     * Refer to the relevant endpoint-specific documentation to determine
     * how time ranges are handled.
     *
     * @required
     * @maps start_at_range
     */
    public function setStartAtRange(TimeRange $startAtRange): void
    {
        $this->startAtRange = $startAtRange;
    }

    /**
     * Returns Location Id.
     *
     * The query expression to search for availabilities matching the specified seller location IDs.
     * This query expression is not applicable when `booking_id` is present.
     */
    public function getLocationId(): ?string
    {
        return $this->locationId;
    }

    /**
     * Sets Location Id.
     *
     * The query expression to search for availabilities matching the specified seller location IDs.
     * This query expression is not applicable when `booking_id` is present.
     *
     * @maps location_id
     */
    public function setLocationId(?string $locationId): void
    {
        $this->locationId = $locationId;
    }

    /**
     * Returns Segment Filters.
     *
     * The list of segment filters to apply. A query with `n` segment filters returns availabilities with
     * `n` segments per
     * availability. It is not applicable when `booking_id` is present.
     *
     * @return SegmentFilter[]|null
     */
    public function getSegmentFilters(): ?array
    {
        return $this->segmentFilters;
    }

    /**
     * Sets Segment Filters.
     *
     * The list of segment filters to apply. A query with `n` segment filters returns availabilities with
     * `n` segments per
     * availability. It is not applicable when `booking_id` is present.
     *
     * @maps segment_filters
     *
     * @param SegmentFilter[]|null $segmentFilters
     */
    public function setSegmentFilters(?array $segmentFilters): void
    {
        $this->segmentFilters = $segmentFilters;
    }

    /**
     * Returns Booking Id.
     *
     * The query expression to search for availabilities for an existing booking by matching the specified
     * `booking_id` value.
     * This is commonly used to reschedule an appointment.
     * If this expression is specified, the `location_id` and `segment_filters` expressions are not allowed.
     */
    public function getBookingId(): ?string
    {
        return $this->bookingId;
    }

    /**
     * Sets Booking Id.
     *
     * The query expression to search for availabilities for an existing booking by matching the specified
     * `booking_id` value.
     * This is commonly used to reschedule an appointment.
     * If this expression is specified, the `location_id` and `segment_filters` expressions are not allowed.
     *
     * @maps booking_id
     */
    public function setBookingId(?string $bookingId): void
    {
        $this->bookingId = $bookingId;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['start_at_range']      = $this->startAtRange;
        if (isset($this->locationId)) {
            $json['location_id']     = $this->locationId;
        }
        if (isset($this->segmentFilters)) {
            $json['segment_filters'] = $this->segmentFilters;
        }
        if (isset($this->bookingId)) {
            $json['booking_id']      = $this->bookingId;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
