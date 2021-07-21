<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Describes a slot available for booking, encapsulating appointment segments, the location and
 * starting time.
 */
class Availability implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $startAt;

    /**
     * @var string|null
     */
    private $locationId;

    /**
     * @var AppointmentSegment[]|null
     */
    private $appointmentSegments;

    /**
     * Returns Start At.
     *
     * The RFC 3339 timestamp specifying the beginning time of the slot available for booking.
     */
    public function getStartAt(): ?string
    {
        return $this->startAt;
    }

    /**
     * Sets Start At.
     *
     * The RFC 3339 timestamp specifying the beginning time of the slot available for booking.
     *
     * @maps start_at
     */
    public function setStartAt(?string $startAt): void
    {
        $this->startAt = $startAt;
    }

    /**
     * Returns Location Id.
     *
     * The ID of the location available for booking.
     */
    public function getLocationId(): ?string
    {
        return $this->locationId;
    }

    /**
     * Sets Location Id.
     *
     * The ID of the location available for booking.
     *
     * @maps location_id
     */
    public function setLocationId(?string $locationId): void
    {
        $this->locationId = $locationId;
    }

    /**
     * Returns Appointment Segments.
     *
     * The list of appointment segments available for booking
     *
     * @return AppointmentSegment[]|null
     */
    public function getAppointmentSegments(): ?array
    {
        return $this->appointmentSegments;
    }

    /**
     * Sets Appointment Segments.
     *
     * The list of appointment segments available for booking
     *
     * @maps appointment_segments
     *
     * @param AppointmentSegment[]|null $appointmentSegments
     */
    public function setAppointmentSegments(?array $appointmentSegments): void
    {
        $this->appointmentSegments = $appointmentSegments;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->startAt)) {
            $json['start_at']             = $this->startAt;
        }
        if (isset($this->locationId)) {
            $json['location_id']          = $this->locationId;
        }
        if (isset($this->appointmentSegments)) {
            $json['appointment_segments'] = $this->appointmentSegments;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
