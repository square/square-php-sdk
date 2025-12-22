<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class DeviceComponentDetailsWiFiDetails extends JsonSerializableType
{
    /**
     * @var ?bool $active A boolean to represent whether the WiFI interface is currently active.
     */
    #[JsonProperty('active')]
    private ?bool $active;

    /**
     * @var ?string $ssid The name of the connected WIFI network.
     */
    #[JsonProperty('ssid')]
    private ?string $ssid;

    /**
     * @var ?string $ipAddressV4 The string representation of the device’s IPv4 address.
     */
    #[JsonProperty('ip_address_v4')]
    private ?string $ipAddressV4;

    /**
     * The security protocol for a secure connection (e.g. WPA2). None provided if the connection
     * is unsecured.
     *
     * @var ?string $secureConnection
     */
    #[JsonProperty('secure_connection')]
    private ?string $secureConnection;

    /**
     * @var ?DeviceComponentDetailsMeasurement $signalStrength A representation of signal strength of the WIFI network connection.
     */
    #[JsonProperty('signal_strength')]
    private ?DeviceComponentDetailsMeasurement $signalStrength;

    /**
     * @param array{
     *   active?: ?bool,
     *   ssid?: ?string,
     *   ipAddressV4?: ?string,
     *   secureConnection?: ?string,
     *   signalStrength?: ?DeviceComponentDetailsMeasurement,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->active = $values['active'] ?? null;
        $this->ssid = $values['ssid'] ?? null;
        $this->ipAddressV4 = $values['ipAddressV4'] ?? null;
        $this->secureConnection = $values['secureConnection'] ?? null;
        $this->signalStrength = $values['signalStrength'] ?? null;
    }

    /**
     * @return ?bool
     */
    public function getActive(): ?bool
    {
        return $this->active;
    }

    /**
     * @param ?bool $value
     */
    public function setActive(?bool $value = null): self
    {
        $this->active = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getSsid(): ?string
    {
        return $this->ssid;
    }

    /**
     * @param ?string $value
     */
    public function setSsid(?string $value = null): self
    {
        $this->ssid = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getIpAddressV4(): ?string
    {
        return $this->ipAddressV4;
    }

    /**
     * @param ?string $value
     */
    public function setIpAddressV4(?string $value = null): self
    {
        $this->ipAddressV4 = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getSecureConnection(): ?string
    {
        return $this->secureConnection;
    }

    /**
     * @param ?string $value
     */
    public function setSecureConnection(?string $value = null): self
    {
        $this->secureConnection = $value;
        return $this;
    }

    /**
     * @return ?DeviceComponentDetailsMeasurement
     */
    public function getSignalStrength(): ?DeviceComponentDetailsMeasurement
    {
        return $this->signalStrength;
    }

    /**
     * @param ?DeviceComponentDetailsMeasurement $value
     */
    public function setSignalStrength(?DeviceComponentDetailsMeasurement $value = null): self
    {
        $this->signalStrength = $value;
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
