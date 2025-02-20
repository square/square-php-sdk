<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Represents a booking as a time-bound service contract for a seller's staff member to provide a specified service
 * at a given location to a requesting customer in one or more appointment segments.
 */
class Booking extends JsonSerializableType
{
    /**
     * @var ?string $id A unique ID of this object representing a booking.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?int $version The revision number for the booking used for optimistic concurrency.
     */
    #[JsonProperty('version')]
    private ?int $version;

    /**
     * The status of the booking, describing where the booking stands with respect to the booking state machine.
     * See [BookingStatus](#type-bookingstatus) for possible values
     *
     * @var ?value-of<BookingStatus> $status
     */
    #[JsonProperty('status')]
    private ?string $status;

    /**
     * @var ?string $createdAt The RFC 3339 timestamp specifying the creation time of this booking.
     */
    #[JsonProperty('created_at')]
    private ?string $createdAt;

    /**
     * @var ?string $updatedAt The RFC 3339 timestamp specifying the most recent update time of this booking.
     */
    #[JsonProperty('updated_at')]
    private ?string $updatedAt;

    /**
     * @var ?string $startAt The RFC 3339 timestamp specifying the starting time of this booking.
     */
    #[JsonProperty('start_at')]
    private ?string $startAt;

    /**
     * @var ?string $locationId The ID of the [Location](entity:Location) object representing the location where the booked service is provided. Once set when the booking is created, its value cannot be changed.
     */
    #[JsonProperty('location_id')]
    private ?string $locationId;

    /**
     * @var ?string $customerId The ID of the [Customer](entity:Customer) object representing the customer receiving the booked service.
     */
    #[JsonProperty('customer_id')]
    private ?string $customerId;

    /**
     * @var ?string $customerNote The free-text field for the customer to supply notes about the booking. For example, the note can be preferences that cannot be expressed by supported attributes of a relevant [CatalogObject](entity:CatalogObject) instance.
     */
    #[JsonProperty('customer_note')]
    private ?string $customerNote;

    /**
     * The free-text field for the seller to supply notes about the booking. For example, the note can be preferences that cannot be expressed by supported attributes of a specific [CatalogObject](entity:CatalogObject) instance.
     * This field should not be visible to customers.
     *
     * @var ?string $sellerNote
     */
    #[JsonProperty('seller_note')]
    private ?string $sellerNote;

    /**
     * @var ?array<AppointmentSegment> $appointmentSegments A list of appointment segments for this booking.
     */
    #[JsonProperty('appointment_segments'), ArrayType([AppointmentSegment::class])]
    private ?array $appointmentSegments;

    /**
     * Additional time at the end of a booking.
     * Applications should not make this field visible to customers of a seller.
     *
     * @var ?int $transitionTimeMinutes
     */
    #[JsonProperty('transition_time_minutes')]
    private ?int $transitionTimeMinutes;

    /**
     * @var ?bool $allDay Whether the booking is of a full business day.
     */
    #[JsonProperty('all_day')]
    private ?bool $allDay;

    /**
     * The type of location where the booking is held.
     * See [BusinessAppointmentSettingsBookingLocationType](#type-businessappointmentsettingsbookinglocationtype) for possible values
     *
     * @var ?value-of<BusinessAppointmentSettingsBookingLocationType> $locationType
     */
    #[JsonProperty('location_type')]
    private ?string $locationType;

    /**
     * @var ?BookingCreatorDetails $creatorDetails Information about the booking creator.
     */
    #[JsonProperty('creator_details')]
    private ?BookingCreatorDetails $creatorDetails;

    /**
     * The source of the booking.
     * Access to this field requires seller-level permissions.
     * See [BookingBookingSource](#type-bookingbookingsource) for possible values
     *
     * @var ?value-of<BookingBookingSource> $source
     */
    #[JsonProperty('source')]
    private ?string $source;

    /**
     * @var ?Address $address Stores a customer address if the location type is `CUSTOMER_LOCATION`.
     */
    #[JsonProperty('address')]
    private ?Address $address;

    /**
     * @param array{
     *   id?: ?string,
     *   version?: ?int,
     *   status?: ?value-of<BookingStatus>,
     *   createdAt?: ?string,
     *   updatedAt?: ?string,
     *   startAt?: ?string,
     *   locationId?: ?string,
     *   customerId?: ?string,
     *   customerNote?: ?string,
     *   sellerNote?: ?string,
     *   appointmentSegments?: ?array<AppointmentSegment>,
     *   transitionTimeMinutes?: ?int,
     *   allDay?: ?bool,
     *   locationType?: ?value-of<BusinessAppointmentSettingsBookingLocationType>,
     *   creatorDetails?: ?BookingCreatorDetails,
     *   source?: ?value-of<BookingBookingSource>,
     *   address?: ?Address,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->version = $values['version'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
        $this->startAt = $values['startAt'] ?? null;
        $this->locationId = $values['locationId'] ?? null;
        $this->customerId = $values['customerId'] ?? null;
        $this->customerNote = $values['customerNote'] ?? null;
        $this->sellerNote = $values['sellerNote'] ?? null;
        $this->appointmentSegments = $values['appointmentSegments'] ?? null;
        $this->transitionTimeMinutes = $values['transitionTimeMinutes'] ?? null;
        $this->allDay = $values['allDay'] ?? null;
        $this->locationType = $values['locationType'] ?? null;
        $this->creatorDetails = $values['creatorDetails'] ?? null;
        $this->source = $values['source'] ?? null;
        $this->address = $values['address'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param ?string $value
     */
    public function setId(?string $value = null): self
    {
        $this->id = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getVersion(): ?int
    {
        return $this->version;
    }

    /**
     * @param ?int $value
     */
    public function setVersion(?int $value = null): self
    {
        $this->version = $value;
        return $this;
    }

    /**
     * @return ?value-of<BookingStatus>
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param ?value-of<BookingStatus> $value
     */
    public function setStatus(?string $value = null): self
    {
        $this->status = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    /**
     * @param ?string $value
     */
    public function setCreatedAt(?string $value = null): self
    {
        $this->createdAt = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

    /**
     * @param ?string $value
     */
    public function setUpdatedAt(?string $value = null): self
    {
        $this->updatedAt = $value;
        return $this;
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
     * @return ?string
     */
    public function getCustomerNote(): ?string
    {
        return $this->customerNote;
    }

    /**
     * @param ?string $value
     */
    public function setCustomerNote(?string $value = null): self
    {
        $this->customerNote = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getSellerNote(): ?string
    {
        return $this->sellerNote;
    }

    /**
     * @param ?string $value
     */
    public function setSellerNote(?string $value = null): self
    {
        $this->sellerNote = $value;
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
     * @return ?int
     */
    public function getTransitionTimeMinutes(): ?int
    {
        return $this->transitionTimeMinutes;
    }

    /**
     * @param ?int $value
     */
    public function setTransitionTimeMinutes(?int $value = null): self
    {
        $this->transitionTimeMinutes = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getAllDay(): ?bool
    {
        return $this->allDay;
    }

    /**
     * @param ?bool $value
     */
    public function setAllDay(?bool $value = null): self
    {
        $this->allDay = $value;
        return $this;
    }

    /**
     * @return ?value-of<BusinessAppointmentSettingsBookingLocationType>
     */
    public function getLocationType(): ?string
    {
        return $this->locationType;
    }

    /**
     * @param ?value-of<BusinessAppointmentSettingsBookingLocationType> $value
     */
    public function setLocationType(?string $value = null): self
    {
        $this->locationType = $value;
        return $this;
    }

    /**
     * @return ?BookingCreatorDetails
     */
    public function getCreatorDetails(): ?BookingCreatorDetails
    {
        return $this->creatorDetails;
    }

    /**
     * @param ?BookingCreatorDetails $value
     */
    public function setCreatorDetails(?BookingCreatorDetails $value = null): self
    {
        $this->creatorDetails = $value;
        return $this;
    }

    /**
     * @return ?value-of<BookingBookingSource>
     */
    public function getSource(): ?string
    {
        return $this->source;
    }

    /**
     * @param ?value-of<BookingBookingSource> $value
     */
    public function setSource(?string $value = null): self
    {
        $this->source = $value;
        return $this;
    }

    /**
     * @return ?Address
     */
    public function getAddress(): ?Address
    {
        return $this->address;
    }

    /**
     * @param ?Address $value
     */
    public function setAddress(?Address $value = null): self
    {
        $this->address = $value;
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
