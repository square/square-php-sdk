<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Defines an appointment slot that encapsulates the appointment segments, location and starting time available for booking.
 */
class Availability extends JsonSerializableType
{
    /**
     * @var ?string $startAt The RFC 3339 timestamp specifying the beginning time of the slot available for booking.
     */
    #[JsonProperty('start_at')]
    private ?string $startAt;

    /**
     * @var ?string $locationId The ID of the location available for booking.
     */
    #[JsonProperty('location_id')]
    private ?string $locationId;

    /**
     * @var ?array<AppointmentSegment> $appointmentSegments The list of appointment segments available for booking
     */
    #[JsonProperty('appointment_segments'), ArrayType([AppointmentSegment::class])]
    private ?array $appointmentSegments;

    /**
     * @param array{
     *   startAt?: ?string,
     *   locationId?: ?string,
     *   appointmentSegments?: ?array<AppointmentSegment>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->startAt = $values['startAt'] ?? null;
        $this->locationId = $values['locationId'] ?? null;
        $this->appointmentSegments = $values['appointmentSegments'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getStartAt(): ?string
    {
        return $this->startAt;
    }

    /**
     * @param ?string $value
     */
    public function setStartAt(?string $value = null): self
    {
        $this->startAt = $value;
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
     * @return ?array<AppointmentSegment>
     */
    public function getAppointmentSegments(): ?array
    {
        return $this->appointmentSegments;
    }

    /**
     * @param ?array<AppointmentSegment> $value
     */
    public function setAppointmentSegments(?array $value = null): self
    {
        $this->appointmentSegments = $value;
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
