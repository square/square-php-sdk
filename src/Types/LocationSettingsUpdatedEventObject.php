<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class LocationSettingsUpdatedEventObject extends JsonSerializableType
{
    /**
     * @var ?CheckoutLocationSettings $locationSettings The updated location settings.
     */
    #[JsonProperty('location_settings')]
    private ?CheckoutLocationSettings $locationSettings;

    /**
     * @param array{
     *   locationSettings?: ?CheckoutLocationSettings,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->locationSettings = $values['locationSettings'] ?? null;
    }

    /**
     * @return ?CheckoutLocationSettings
     */
    public function getLocationSettings(): ?CheckoutLocationSettings
    {
        return $this->locationSettings;
    }

    /**
     * @param ?CheckoutLocationSettings $value
     */
    public function setLocationSettings(?CheckoutLocationSettings $value = null): self
    {
        $this->locationSettings = $value;
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
