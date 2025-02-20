<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * The service appointment settings, including where and how the service is provided.
 */
class BusinessAppointmentSettings extends JsonSerializableType
{
    /**
     * Types of the location allowed for bookings.
     * See [BusinessAppointmentSettingsBookingLocationType](#type-businessappointmentsettingsbookinglocationtype) for possible values
     *
     * @var ?array<value-of<BusinessAppointmentSettingsBookingLocationType>> $locationTypes
     */
    #[JsonProperty('location_types'), ArrayType(['string'])]
    private ?array $locationTypes;

    /**
     * The time unit of the service duration for bookings.
     * See [BusinessAppointmentSettingsAlignmentTime](#type-businessappointmentsettingsalignmenttime) for possible values
     *
     * @var ?value-of<BusinessAppointmentSettingsAlignmentTime> $alignmentTime
     */
    #[JsonProperty('alignment_time')]
    private ?string $alignmentTime;

    /**
     * @var ?int $minBookingLeadTimeSeconds The minimum lead time in seconds before a service can be booked. A booking must be created at least this amount of time before its starting time.
     */
    #[JsonProperty('min_booking_lead_time_seconds')]
    private ?int $minBookingLeadTimeSeconds;

    /**
     * @var ?int $maxBookingLeadTimeSeconds The maximum lead time in seconds before a service can be booked. A booking must be created at most this amount of time before its starting time.
     */
    #[JsonProperty('max_booking_lead_time_seconds')]
    private ?int $maxBookingLeadTimeSeconds;

    /**
     * Indicates whether a customer can choose from all available time slots and have a staff member assigned
     * automatically (`true`) or not (`false`).
     *
     * @var ?bool $anyTeamMemberBookingEnabled
     */
    #[JsonProperty('any_team_member_booking_enabled')]
    private ?bool $anyTeamMemberBookingEnabled;

    /**
     * @var ?bool $multipleServiceBookingEnabled Indicates whether a customer can book multiple services in a single online booking.
     */
    #[JsonProperty('multiple_service_booking_enabled')]
    private ?bool $multipleServiceBookingEnabled;

    /**
     * Indicates whether the daily appointment limit applies to team members or to
     * business locations.
     * See [BusinessAppointmentSettingsMaxAppointmentsPerDayLimitType](#type-businessappointmentsettingsmaxappointmentsperdaylimittype) for possible values
     *
     * @var ?value-of<BusinessAppointmentSettingsMaxAppointmentsPerDayLimitType> $maxAppointmentsPerDayLimitType
     */
    #[JsonProperty('max_appointments_per_day_limit_type')]
    private ?string $maxAppointmentsPerDayLimitType;

    /**
     * @var ?int $maxAppointmentsPerDayLimit The maximum number of daily appointments per team member or per location.
     */
    #[JsonProperty('max_appointments_per_day_limit')]
    private ?int $maxAppointmentsPerDayLimit;

    /**
     * @var ?int $cancellationWindowSeconds The cut-off time in seconds for allowing clients to cancel or reschedule an appointment.
     */
    #[JsonProperty('cancellation_window_seconds')]
    private ?int $cancellationWindowSeconds;

    /**
     * @var ?Money $cancellationFeeMoney The flat-fee amount charged for a no-show booking.
     */
    #[JsonProperty('cancellation_fee_money')]
    private ?Money $cancellationFeeMoney;

    /**
     * The cancellation policy adopted by the seller.
     * See [BusinessAppointmentSettingsCancellationPolicy](#type-businessappointmentsettingscancellationpolicy) for possible values
     *
     * @var ?value-of<BusinessAppointmentSettingsCancellationPolicy> $cancellationPolicy
     */
    #[JsonProperty('cancellation_policy')]
    private ?string $cancellationPolicy;

    /**
     * @var ?string $cancellationPolicyText The free-form text of the seller's cancellation policy.
     */
    #[JsonProperty('cancellation_policy_text')]
    private ?string $cancellationPolicyText;

    /**
     * @var ?bool $skipBookingFlowStaffSelection Indicates whether customers has an assigned staff member (`true`) or can select s staff member of their choice (`false`).
     */
    #[JsonProperty('skip_booking_flow_staff_selection')]
    private ?bool $skipBookingFlowStaffSelection;

    /**
     * @param array{
     *   locationTypes?: ?array<value-of<BusinessAppointmentSettingsBookingLocationType>>,
     *   alignmentTime?: ?value-of<BusinessAppointmentSettingsAlignmentTime>,
     *   minBookingLeadTimeSeconds?: ?int,
     *   maxBookingLeadTimeSeconds?: ?int,
     *   anyTeamMemberBookingEnabled?: ?bool,
     *   multipleServiceBookingEnabled?: ?bool,
     *   maxAppointmentsPerDayLimitType?: ?value-of<BusinessAppointmentSettingsMaxAppointmentsPerDayLimitType>,
     *   maxAppointmentsPerDayLimit?: ?int,
     *   cancellationWindowSeconds?: ?int,
     *   cancellationFeeMoney?: ?Money,
     *   cancellationPolicy?: ?value-of<BusinessAppointmentSettingsCancellationPolicy>,
     *   cancellationPolicyText?: ?string,
     *   skipBookingFlowStaffSelection?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->locationTypes = $values['locationTypes'] ?? null;
        $this->alignmentTime = $values['alignmentTime'] ?? null;
        $this->minBookingLeadTimeSeconds = $values['minBookingLeadTimeSeconds'] ?? null;
        $this->maxBookingLeadTimeSeconds = $values['maxBookingLeadTimeSeconds'] ?? null;
        $this->anyTeamMemberBookingEnabled = $values['anyTeamMemberBookingEnabled'] ?? null;
        $this->multipleServiceBookingEnabled = $values['multipleServiceBookingEnabled'] ?? null;
        $this->maxAppointmentsPerDayLimitType = $values['maxAppointmentsPerDayLimitType'] ?? null;
        $this->maxAppointmentsPerDayLimit = $values['maxAppointmentsPerDayLimit'] ?? null;
        $this->cancellationWindowSeconds = $values['cancellationWindowSeconds'] ?? null;
        $this->cancellationFeeMoney = $values['cancellationFeeMoney'] ?? null;
        $this->cancellationPolicy = $values['cancellationPolicy'] ?? null;
        $this->cancellationPolicyText = $values['cancellationPolicyText'] ?? null;
        $this->skipBookingFlowStaffSelection = $values['skipBookingFlowStaffSelection'] ?? null;
    }

    /**
     * @return ?array<value-of<BusinessAppointmentSettingsBookingLocationType>>
     */
    public function getLocationTypes(): ?array
    {
        return $this->locationTypes;
    }

    /**
     * @param ?array<value-of<BusinessAppointmentSettingsBookingLocationType>> $value
     */
    public function setLocationTypes(?array $value = null): self
    {
        $this->locationTypes = $value;
        return $this;
    }

    /**
     * @return ?value-of<BusinessAppointmentSettingsAlignmentTime>
     */
    public function getAlignmentTime(): ?string
    {
        return $this->alignmentTime;
    }

    /**
     * @param ?value-of<BusinessAppointmentSettingsAlignmentTime> $value
     */
    public function setAlignmentTime(?string $value = null): self
    {
        $this->alignmentTime = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getMinBookingLeadTimeSeconds(): ?int
    {
        return $this->minBookingLeadTimeSeconds;
    }

    /**
     * @param ?int $value
     */
    public function setMinBookingLeadTimeSeconds(?int $value = null): self
    {
        $this->minBookingLeadTimeSeconds = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getMaxBookingLeadTimeSeconds(): ?int
    {
        return $this->maxBookingLeadTimeSeconds;
    }

    /**
     * @param ?int $value
     */
    public function setMaxBookingLeadTimeSeconds(?int $value = null): self
    {
        $this->maxBookingLeadTimeSeconds = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getAnyTeamMemberBookingEnabled(): ?bool
    {
        return $this->anyTeamMemberBookingEnabled;
    }

    /**
     * @param ?bool $value
     */
    public function setAnyTeamMemberBookingEnabled(?bool $value = null): self
    {
        $this->anyTeamMemberBookingEnabled = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getMultipleServiceBookingEnabled(): ?bool
    {
        return $this->multipleServiceBookingEnabled;
    }

    /**
     * @param ?bool $value
     */
    public function setMultipleServiceBookingEnabled(?bool $value = null): self
    {
        $this->multipleServiceBookingEnabled = $value;
        return $this;
    }

    /**
     * @return ?value-of<BusinessAppointmentSettingsMaxAppointmentsPerDayLimitType>
     */
    public function getMaxAppointmentsPerDayLimitType(): ?string
    {
        return $this->maxAppointmentsPerDayLimitType;
    }

    /**
     * @param ?value-of<BusinessAppointmentSettingsMaxAppointmentsPerDayLimitType> $value
     */
    public function setMaxAppointmentsPerDayLimitType(?string $value = null): self
    {
        $this->maxAppointmentsPerDayLimitType = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getMaxAppointmentsPerDayLimit(): ?int
    {
        return $this->maxAppointmentsPerDayLimit;
    }

    /**
     * @param ?int $value
     */
    public function setMaxAppointmentsPerDayLimit(?int $value = null): self
    {
        $this->maxAppointmentsPerDayLimit = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getCancellationWindowSeconds(): ?int
    {
        return $this->cancellationWindowSeconds;
    }

    /**
     * @param ?int $value
     */
    public function setCancellationWindowSeconds(?int $value = null): self
    {
        $this->cancellationWindowSeconds = $value;
        return $this;
    }

    /**
     * @return ?Money
     */
    public function getCancellationFeeMoney(): ?Money
    {
        return $this->cancellationFeeMoney;
    }

    /**
     * @param ?Money $value
     */
    public function setCancellationFeeMoney(?Money $value = null): self
    {
        $this->cancellationFeeMoney = $value;
        return $this;
    }

    /**
     * @return ?value-of<BusinessAppointmentSettingsCancellationPolicy>
     */
    public function getCancellationPolicy(): ?string
    {
        return $this->cancellationPolicy;
    }

    /**
     * @param ?value-of<BusinessAppointmentSettingsCancellationPolicy> $value
     */
    public function setCancellationPolicy(?string $value = null): self
    {
        $this->cancellationPolicy = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCancellationPolicyText(): ?string
    {
        return $this->cancellationPolicyText;
    }

    /**
     * @param ?string $value
     */
    public function setCancellationPolicyText(?string $value = null): self
    {
        $this->cancellationPolicyText = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getSkipBookingFlowStaffSelection(): ?bool
    {
        return $this->skipBookingFlowStaffSelection;
    }

    /**
     * @param ?bool $value
     */
    public function setSkipBookingFlowStaffSelection(?bool $value = null): self
    {
        $this->skipBookingFlowStaffSelection = $value;
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
