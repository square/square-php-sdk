<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

class BusinessBookingProfile implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $sellerId;

    /**
     * @var string|null
     */
    private $createdAt;

    /**
     * @var bool|null
     */
    private $bookingEnabled;

    /**
     * @var string|null
     */
    private $customerTimezoneChoice;

    /**
     * @var string|null
     */
    private $bookingPolicy;

    /**
     * @var bool|null
     */
    private $allowUserCancel;

    /**
     * @var BusinessAppointmentSettings|null
     */
    private $businessAppointmentSettings;

    /**
     * @var bool|null
     */
    private $supportSellerLevelWrites;

    /**
     * Returns Seller Id.
     * The ID of the seller, obtainable using the Merchants API.
     */
    public function getSellerId(): ?string
    {
        return $this->sellerId;
    }

    /**
     * Sets Seller Id.
     * The ID of the seller, obtainable using the Merchants API.
     *
     * @maps seller_id
     */
    public function setSellerId(?string $sellerId): void
    {
        $this->sellerId = $sellerId;
    }

    /**
     * Returns Created At.
     * The RFC 3339 timestamp specifying the booking's creation time.
     */
    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    /**
     * Sets Created At.
     * The RFC 3339 timestamp specifying the booking's creation time.
     *
     * @maps created_at
     */
    public function setCreatedAt(?string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Returns Booking Enabled.
     * Indicates whether the seller is open for booking.
     */
    public function getBookingEnabled(): ?bool
    {
        return $this->bookingEnabled;
    }

    /**
     * Sets Booking Enabled.
     * Indicates whether the seller is open for booking.
     *
     * @maps booking_enabled
     */
    public function setBookingEnabled(?bool $bookingEnabled): void
    {
        $this->bookingEnabled = $bookingEnabled;
    }

    /**
     * Returns Customer Timezone Choice.
     * Choices of customer-facing time zone used for bookings.
     */
    public function getCustomerTimezoneChoice(): ?string
    {
        return $this->customerTimezoneChoice;
    }

    /**
     * Sets Customer Timezone Choice.
     * Choices of customer-facing time zone used for bookings.
     *
     * @maps customer_timezone_choice
     * @factory \Square\Models\BusinessBookingProfileCustomerTimezoneChoice::checkValue
     */
    public function setCustomerTimezoneChoice(?string $customerTimezoneChoice): void
    {
        $this->customerTimezoneChoice = $customerTimezoneChoice;
    }

    /**
     * Returns Booking Policy.
     * Policies for accepting bookings.
     */
    public function getBookingPolicy(): ?string
    {
        return $this->bookingPolicy;
    }

    /**
     * Sets Booking Policy.
     * Policies for accepting bookings.
     *
     * @maps booking_policy
     * @factory \Square\Models\BusinessBookingProfileBookingPolicy::checkValue
     */
    public function setBookingPolicy(?string $bookingPolicy): void
    {
        $this->bookingPolicy = $bookingPolicy;
    }

    /**
     * Returns Allow User Cancel.
     * Indicates whether customers can cancel or reschedule their own bookings (`true`) or not (`false`).
     */
    public function getAllowUserCancel(): ?bool
    {
        return $this->allowUserCancel;
    }

    /**
     * Sets Allow User Cancel.
     * Indicates whether customers can cancel or reschedule their own bookings (`true`) or not (`false`).
     *
     * @maps allow_user_cancel
     */
    public function setAllowUserCancel(?bool $allowUserCancel): void
    {
        $this->allowUserCancel = $allowUserCancel;
    }

    /**
     * Returns Business Appointment Settings.
     * The service appointment settings, including where and how the service is provided.
     */
    public function getBusinessAppointmentSettings(): ?BusinessAppointmentSettings
    {
        return $this->businessAppointmentSettings;
    }

    /**
     * Sets Business Appointment Settings.
     * The service appointment settings, including where and how the service is provided.
     *
     * @maps business_appointment_settings
     */
    public function setBusinessAppointmentSettings(?BusinessAppointmentSettings $businessAppointmentSettings): void
    {
        $this->businessAppointmentSettings = $businessAppointmentSettings;
    }

    /**
     * Returns Support Seller Level Writes.
     * Indicates whether the seller's subscription to Square Appointments supports creating, updating or
     * canceling an appointment through the API (`true`) or not (`false`) using seller permission.
     */
    public function getSupportSellerLevelWrites(): ?bool
    {
        return $this->supportSellerLevelWrites;
    }

    /**
     * Sets Support Seller Level Writes.
     * Indicates whether the seller's subscription to Square Appointments supports creating, updating or
     * canceling an appointment through the API (`true`) or not (`false`) using seller permission.
     *
     * @maps support_seller_level_writes
     */
    public function setSupportSellerLevelWrites(?bool $supportSellerLevelWrites): void
    {
        $this->supportSellerLevelWrites = $supportSellerLevelWrites;
    }

    /**
     * Encode this object to JSON
     *
     * @param bool $asArrayWhenEmpty Whether to serialize this model as an array whenever no fields
     *        are set. (default: false)
     *
     * @return array|stdClass
     */
    #[\ReturnTypeWillChange] // @phan-suppress-current-line PhanUndeclaredClassAttribute for (php < 8.1)
    public function jsonSerialize(bool $asArrayWhenEmpty = false)
    {
        $json = [];
        if (isset($this->sellerId)) {
            $json['seller_id']                     = $this->sellerId;
        }
        if (isset($this->createdAt)) {
            $json['created_at']                    = $this->createdAt;
        }
        if (isset($this->bookingEnabled)) {
            $json['booking_enabled']               = $this->bookingEnabled;
        }
        if (isset($this->customerTimezoneChoice)) {
            $json['customer_timezone_choice']      =
                BusinessBookingProfileCustomerTimezoneChoice::checkValue(
                    $this->customerTimezoneChoice
                );
        }
        if (isset($this->bookingPolicy)) {
            $json['booking_policy']                =
                BusinessBookingProfileBookingPolicy::checkValue(
                    $this->bookingPolicy
                );
        }
        if (isset($this->allowUserCancel)) {
            $json['allow_user_cancel']             = $this->allowUserCancel;
        }
        if (isset($this->businessAppointmentSettings)) {
            $json['business_appointment_settings'] = $this->businessAppointmentSettings;
        }
        if (isset($this->supportSellerLevelWrites)) {
            $json['support_seller_level_writes']   = $this->supportSellerLevelWrites;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
