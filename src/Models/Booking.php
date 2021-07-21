<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Represents a booking as a time-bound service contract for a seller's staff member to provide a
 * specified service
 * at a given location to a requesting customer in one or more appointment segments.
 */
class Booking implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $id;

    /**
     * @var int|null
     */
    private $version;

    /**
     * @var string|null
     */
    private $status;

    /**
     * @var string|null
     */
    private $createdAt;

    /**
     * @var string|null
     */
    private $updatedAt;

    /**
     * @var string|null
     */
    private $startAt;

    /**
     * @var string|null
     */
    private $locationId;

    /**
     * @var string|null
     */
    private $customerId;

    /**
     * @var string|null
     */
    private $customerNote;

    /**
     * @var string|null
     */
    private $sellerNote;

    /**
     * @var AppointmentSegment[]|null
     */
    private $appointmentSegments;

    /**
     * Returns Id.
     *
     * A unique ID of this object representing a booking.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Sets Id.
     *
     * A unique ID of this object representing a booking.
     *
     * @maps id
     */
    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    /**
     * Returns Version.
     *
     * The revision number for the booking used for optimistic concurrency.
     */
    public function getVersion(): ?int
    {
        return $this->version;
    }

    /**
     * Sets Version.
     *
     * The revision number for the booking used for optimistic concurrency.
     *
     * @maps version
     */
    public function setVersion(?int $version): void
    {
        $this->version = $version;
    }

    /**
     * Returns Status.
     *
     * Supported booking statuses.
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * Sets Status.
     *
     * Supported booking statuses.
     *
     * @maps status
     */
    public function setStatus(?string $status): void
    {
        $this->status = $status;
    }

    /**
     * Returns Created At.
     *
     * The timestamp specifying the creation time of this booking, in RFC 3339 format.
     */
    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    /**
     * Sets Created At.
     *
     * The timestamp specifying the creation time of this booking, in RFC 3339 format.
     *
     * @maps created_at
     */
    public function setCreatedAt(?string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Returns Updated At.
     *
     * The timestamp specifying the most recent update time of this booking, in RFC 3339 format.
     */
    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

    /**
     * Sets Updated At.
     *
     * The timestamp specifying the most recent update time of this booking, in RFC 3339 format.
     *
     * @maps updated_at
     */
    public function setUpdatedAt(?string $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * Returns Start At.
     *
     * The timestamp specifying the starting time of this booking, in RFC 3339 format.
     */
    public function getStartAt(): ?string
    {
        return $this->startAt;
    }

    /**
     * Sets Start At.
     *
     * The timestamp specifying the starting time of this booking, in RFC 3339 format.
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
     * The ID of the [Location]($m/Location) object representing the location where the booked service is
     * provided.
     */
    public function getLocationId(): ?string
    {
        return $this->locationId;
    }

    /**
     * Sets Location Id.
     *
     * The ID of the [Location]($m/Location) object representing the location where the booked service is
     * provided.
     *
     * @maps location_id
     */
    public function setLocationId(?string $locationId): void
    {
        $this->locationId = $locationId;
    }

    /**
     * Returns Customer Id.
     *
     * The ID of the [Customer]($m/Customer) object representing the customer attending this booking
     */
    public function getCustomerId(): ?string
    {
        return $this->customerId;
    }

    /**
     * Sets Customer Id.
     *
     * The ID of the [Customer]($m/Customer) object representing the customer attending this booking
     *
     * @maps customer_id
     */
    public function setCustomerId(?string $customerId): void
    {
        $this->customerId = $customerId;
    }

    /**
     * Returns Customer Note.
     *
     * The free-text field for the customer to supply notes about the booking. For example, the note can be
     * preferences that cannot be expressed by supported attributes of a relevant
     * [CatalogObject]($m/CatalogObject) instance.
     */
    public function getCustomerNote(): ?string
    {
        return $this->customerNote;
    }

    /**
     * Sets Customer Note.
     *
     * The free-text field for the customer to supply notes about the booking. For example, the note can be
     * preferences that cannot be expressed by supported attributes of a relevant
     * [CatalogObject]($m/CatalogObject) instance.
     *
     * @maps customer_note
     */
    public function setCustomerNote(?string $customerNote): void
    {
        $this->customerNote = $customerNote;
    }

    /**
     * Returns Seller Note.
     *
     * The free-text field for the seller to supply notes about the booking. For example, the note can be
     * preferences that cannot be expressed by supported attributes of a specific
     * [CatalogObject]($m/CatalogObject) instance.
     * This field should not be visible to customers.
     */
    public function getSellerNote(): ?string
    {
        return $this->sellerNote;
    }

    /**
     * Sets Seller Note.
     *
     * The free-text field for the seller to supply notes about the booking. For example, the note can be
     * preferences that cannot be expressed by supported attributes of a specific
     * [CatalogObject]($m/CatalogObject) instance.
     * This field should not be visible to customers.
     *
     * @maps seller_note
     */
    public function setSellerNote(?string $sellerNote): void
    {
        $this->sellerNote = $sellerNote;
    }

    /**
     * Returns Appointment Segments.
     *
     * A list of appointment segments for this booking.
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
     * A list of appointment segments for this booking.
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
        if (isset($this->id)) {
            $json['id']                   = $this->id;
        }
        if (isset($this->version)) {
            $json['version']              = $this->version;
        }
        if (isset($this->status)) {
            $json['status']               = $this->status;
        }
        if (isset($this->createdAt)) {
            $json['created_at']           = $this->createdAt;
        }
        if (isset($this->updatedAt)) {
            $json['updated_at']           = $this->updatedAt;
        }
        if (isset($this->startAt)) {
            $json['start_at']             = $this->startAt;
        }
        if (isset($this->locationId)) {
            $json['location_id']          = $this->locationId;
        }
        if (isset($this->customerId)) {
            $json['customer_id']          = $this->customerId;
        }
        if (isset($this->customerNote)) {
            $json['customer_note']        = $this->customerNote;
        }
        if (isset($this->sellerNote)) {
            $json['seller_note']          = $this->sellerNote;
        }
        if (isset($this->appointmentSegments)) {
            $json['appointment_segments'] = $this->appointmentSegments;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
