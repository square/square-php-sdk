<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class DeviceComponentDetailsBatteryDetails extends JsonSerializableType
{
    /**
     * @var ?int $visiblePercent The battery charge percentage as displayed on the device.
     */
    #[JsonProperty('visible_percent')]
    private ?int $visiblePercent;

    /**
     * The status of external_power.
     * See [ExternalPower](#type-externalpower) for possible values
     *
     * @var ?value-of<DeviceComponentDetailsExternalPower> $externalPower
     */
    #[JsonProperty('external_power')]
    private ?string $externalPower;

    /**
     * @param array{
     *   visiblePercent?: ?int,
     *   externalPower?: ?value-of<DeviceComponentDetailsExternalPower>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->visiblePercent = $values['visiblePercent'] ?? null;
        $this->externalPower = $values['externalPower'] ?? null;
    }

    /**
     * @return ?int
     */
    public function getVisiblePercent(): ?int
    {
        return $this->visiblePercent;
    }

    /**
     * @param ?int $value
     */
    public function setVisiblePercent(?int $value = null): self
    {
        $this->visiblePercent = $value;
        return $this;
    }

    /**
     * @return ?value-of<DeviceComponentDetailsExternalPower>
     */
    public function getExternalPower(): ?string
    {
        return $this->externalPower;
    }

    /**
     * @param ?value-of<DeviceComponentDetailsExternalPower> $value
     */
    public function setExternalPower(?string $value = null): self
    {
        $this->externalPower = $value;
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
