<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class CheckoutLocationSettings extends JsonSerializableType
{
    /**
     * @var ?string $locationId The ID of the location that these settings apply to.
     */
    #[JsonProperty('location_id')]
    private ?string $locationId;

    /**
     * @var ?bool $customerNotesEnabled Indicates whether customers are allowed to leave notes at checkout.
     */
    #[JsonProperty('customer_notes_enabled')]
    private ?bool $customerNotesEnabled;

    /**
     * Policy information is displayed at the bottom of the checkout pages.
     * You can set a maximum of two policies.
     *
     * @var ?array<CheckoutLocationSettingsPolicy> $policies
     */
    #[JsonProperty('policies'), ArrayType([CheckoutLocationSettingsPolicy::class])]
    private ?array $policies;

    /**
     * @var ?CheckoutLocationSettingsBranding $branding The branding settings for this location.
     */
    #[JsonProperty('branding')]
    private ?CheckoutLocationSettingsBranding $branding;

    /**
     * @var ?CheckoutLocationSettingsTipping $tipping The tip settings for this location.
     */
    #[JsonProperty('tipping')]
    private ?CheckoutLocationSettingsTipping $tipping;

    /**
     * @var ?CheckoutLocationSettingsCoupons $coupons The coupon settings for this location.
     */
    #[JsonProperty('coupons')]
    private ?CheckoutLocationSettingsCoupons $coupons;

    /**
     * The timestamp when the settings were last updated, in RFC 3339 format.
     * Examples for January 25th, 2020 6:25:34pm Pacific Standard Time:
     * UTC: 2020-01-26T02:25:34Z
     * Pacific Standard Time with UTC offset: 2020-01-25T18:25:34-08:00
     *
     * @var ?string $updatedAt
     */
    #[JsonProperty('updated_at')]
    private ?string $updatedAt;

    /**
     * @param array{
     *   locationId?: ?string,
     *   customerNotesEnabled?: ?bool,
     *   policies?: ?array<CheckoutLocationSettingsPolicy>,
     *   branding?: ?CheckoutLocationSettingsBranding,
     *   tipping?: ?CheckoutLocationSettingsTipping,
     *   coupons?: ?CheckoutLocationSettingsCoupons,
     *   updatedAt?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->locationId = $values['locationId'] ?? null;
        $this->customerNotesEnabled = $values['customerNotesEnabled'] ?? null;
        $this->policies = $values['policies'] ?? null;
        $this->branding = $values['branding'] ?? null;
        $this->tipping = $values['tipping'] ?? null;
        $this->coupons = $values['coupons'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
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
     * @return ?bool
     */
    public function getCustomerNotesEnabled(): ?bool
    {
        return $this->customerNotesEnabled;
    }

    /**
     * @param ?bool $value
     */
    public function setCustomerNotesEnabled(?bool $value = null): self
    {
        $this->customerNotesEnabled = $value;
        return $this;
    }

    /**
     * @return ?array<CheckoutLocationSettingsPolicy>
     */
    public function getPolicies(): ?array
    {
        return $this->policies;
    }

    /**
     * @param ?array<CheckoutLocationSettingsPolicy> $value
     */
    public function setPolicies(?array $value = null): self
    {
        $this->policies = $value;
        return $this;
    }

    /**
     * @return ?CheckoutLocationSettingsBranding
     */
    public function getBranding(): ?CheckoutLocationSettingsBranding
    {
        return $this->branding;
    }

    /**
     * @param ?CheckoutLocationSettingsBranding $value
     */
    public function setBranding(?CheckoutLocationSettingsBranding $value = null): self
    {
        $this->branding = $value;
        return $this;
    }

    /**
     * @return ?CheckoutLocationSettingsTipping
     */
    public function getTipping(): ?CheckoutLocationSettingsTipping
    {
        return $this->tipping;
    }

    /**
     * @param ?CheckoutLocationSettingsTipping $value
     */
    public function setTipping(?CheckoutLocationSettingsTipping $value = null): self
    {
        $this->tipping = $value;
        return $this;
    }

    /**
     * @return ?CheckoutLocationSettingsCoupons
     */
    public function getCoupons(): ?CheckoutLocationSettingsCoupons
    {
        return $this->coupons;
    }

    /**
     * @param ?CheckoutLocationSettingsCoupons $value
     */
    public function setCoupons(?CheckoutLocationSettingsCoupons $value = null): self
    {
        $this->coupons = $value;
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
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
