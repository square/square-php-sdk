<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * A seller's business booking profile, including booking policy, appointment settings, etc.
 */
class BusinessBookingProfile extends JsonSerializableType
{
    /**
     * @var ?string $sellerId The ID of the seller, obtainable using the Merchants API.
     */
    #[JsonProperty('seller_id')]
    private ?string $sellerId;

    /**
     * @var ?string $createdAt The RFC 3339 timestamp specifying the booking's creation time.
     */
    #[JsonProperty('created_at')]
    private ?string $createdAt;

    /**
     * @var ?bool $bookingEnabled Indicates whether the seller is open for booking.
     */
    #[JsonProperty('booking_enabled')]
    private ?bool $bookingEnabled;

    /**
     * The choice of customer's time zone information of a booking.
     * The Square online booking site and all notifications to customers uses either the seller location’s time zone
     * or the time zone the customer chooses at booking.
     * See [BusinessBookingProfileCustomerTimezoneChoice](#type-businessbookingprofilecustomertimezonechoice) for possible values
     *
     * @var ?value-of<BusinessBookingProfileCustomerTimezoneChoice> $customerTimezoneChoice
     */
    #[JsonProperty('customer_timezone_choice')]
    private ?string $customerTimezoneChoice;

    /**
     * The policy for the seller to automatically accept booking requests (`ACCEPT_ALL`) or not (`REQUIRES_ACCEPTANCE`).
     * See [BusinessBookingProfileBookingPolicy](#type-businessbookingprofilebookingpolicy) for possible values
     *
     * @var ?value-of<BusinessBookingProfileBookingPolicy> $bookingPolicy
     */
    #[JsonProperty('booking_policy')]
    private ?string $bookingPolicy;

    /**
     * @var ?bool $allowUserCancel Indicates whether customers can cancel or reschedule their own bookings (`true`) or not (`false`).
     */
    #[JsonProperty('allow_user_cancel')]
    private ?bool $allowUserCancel;

    /**
     * @var ?BusinessAppointmentSettings $businessAppointmentSettings Settings for appointment-type bookings.
     */
    #[JsonProperty('business_appointment_settings')]
    private ?BusinessAppointmentSettings $businessAppointmentSettings;

    /**
     * @var ?bool $supportSellerLevelWrites Indicates whether the seller's subscription to Square Appointments supports creating, updating or canceling an appointment through the API (`true`) or not (`false`) using seller permission.
     */
    #[JsonProperty('support_seller_level_writes')]
    private ?bool $supportSellerLevelWrites;

    /**
     * @param array{
     *   sellerId?: ?string,
     *   createdAt?: ?string,
     *   bookingEnabled?: ?bool,
     *   customerTimezoneChoice?: ?value-of<BusinessBookingProfileCustomerTimezoneChoice>,
     *   bookingPolicy?: ?value-of<BusinessBookingProfileBookingPolicy>,
     *   allowUserCancel?: ?bool,
     *   businessAppointmentSettings?: ?BusinessAppointmentSettings,
     *   supportSellerLevelWrites?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->sellerId = $values['sellerId'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->bookingEnabled = $values['bookingEnabled'] ?? null;
        $this->customerTimezoneChoice = $values['customerTimezoneChoice'] ?? null;
        $this->bookingPolicy = $values['bookingPolicy'] ?? null;
        $this->allowUserCancel = $values['allowUserCancel'] ?? null;
        $this->businessAppointmentSettings = $values['businessAppointmentSettings'] ?? null;
        $this->supportSellerLevelWrites = $values['supportSellerLevelWrites'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getSellerId(): ?string
    {
        return $this->sellerId;
    }

    /**
     * @param ?string $value
     */
    public function setSellerId(?string $value = null): self
    {
        $this->sellerId = $value;
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
     * @return ?bool
     */
    public function getBookingEnabled(): ?bool
    {
        return $this->bookingEnabled;
    }

    /**
     * @param ?bool $value
     */
    public function setBookingEnabled(?bool $value = null): self
    {
        $this->bookingEnabled = $value;
        return $this;
    }

    /**
     * @return ?value-of<BusinessBookingProfileCustomerTimezoneChoice>
     */
    public function getCustomerTimezoneChoice(): ?string
    {
        return $this->customerTimezoneChoice;
    }

    /**
     * @param ?value-of<BusinessBookingProfileCustomerTimezoneChoice> $value
     */
    public function setCustomerTimezoneChoice(?string $value = null): self
    {
        $this->customerTimezoneChoice = $value;
        return $this;
    }

    /**
     * @return ?value-of<BusinessBookingProfileBookingPolicy>
     */
    public function getBookingPolicy(): ?string
    {
        return $this->bookingPolicy;
    }

    /**
     * @param ?value-of<BusinessBookingProfileBookingPolicy> $value
     */
    public function setBookingPolicy(?string $value = null): self
    {
        $this->bookingPolicy = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getAllowUserCancel(): ?bool
    {
        return $this->allowUserCancel;
    }

    /**
     * @param ?bool $value
     */
    public function setAllowUserCancel(?bool $value = null): self
    {
        $this->allowUserCancel = $value;
        return $this;
    }

    /**
     * @return ?BusinessAppointmentSettings
     */
    public function getBusinessAppointmentSettings(): ?BusinessAppointmentSettings
    {
        return $this->businessAppointmentSettings;
    }

    /**
     * @param ?BusinessAppointmentSettings $value
     */
    public function setBusinessAppointmentSettings(?BusinessAppointmentSettings $value = null): self
    {
        $this->businessAppointmentSettings = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getSupportSellerLevelWrites(): ?bool
    {
        return $this->supportSellerLevelWrites;
    }

    /**
     * @param ?bool $value
     */
    public function setSupportSellerLevelWrites(?bool $value = null): self
    {
        $this->supportSellerLevelWrites = $value;
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
