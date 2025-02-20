<?php

namespace Square\Checkout\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\CheckoutLocationSettings;
use Square\Core\Json\JsonProperty;

class UpdateLocationSettingsRequest extends JsonSerializableType
{
    /**
     * @var string $locationId The ID of the location for which to retrieve settings.
     */
    private string $locationId;

    /**
     * @var CheckoutLocationSettings $locationSettings Describe your updates using the `location_settings` object. Make sure it contains only the fields that have changed.
     */
    #[JsonProperty('location_settings')]
    private CheckoutLocationSettings $locationSettings;

    /**
     * @param array{
     *   locationId: string,
     *   locationSettings: CheckoutLocationSettings,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->locationId = $values['locationId'];
        $this->locationSettings = $values['locationSettings'];
    }

    /**
     * @return string
     */
    public function getLocationId(): string
    {
        return $this->locationId;
    }

    /**
     * @param string $value
     */
    public function setLocationId(string $value): self
    {
        $this->locationId = $value;
        return $this;
    }

    /**
     * @return CheckoutLocationSettings
     */
    public function getLocationSettings(): CheckoutLocationSettings
    {
        return $this->locationSettings;
    }

    /**
     * @param CheckoutLocationSettings $value
     */
    public function setLocationSettings(CheckoutLocationSettings $value): self
    {
        $this->locationSettings = $value;
        return $this;
    }
}
