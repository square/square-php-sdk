<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class DeviceMetadata extends JsonSerializableType
{
    /**
     * @var ?string $batteryPercentage The Terminal’s remaining battery percentage, between 1-100.
     */
    #[JsonProperty('battery_percentage')]
    private ?string $batteryPercentage;

    /**
     * The current charging state of the Terminal.
     * Options: `CHARGING`, `NOT_CHARGING`
     *
     * @var ?string $chargingState
     */
    #[JsonProperty('charging_state')]
    private ?string $chargingState;

    /**
     * @var ?string $locationId The ID of the Square seller business location associated with the Terminal.
     */
    #[JsonProperty('location_id')]
    private ?string $locationId;

    /**
     * @var ?string $merchantId The ID of the Square merchant account that is currently signed-in to the Terminal.
     */
    #[JsonProperty('merchant_id')]
    private ?string $merchantId;

    /**
     * The Terminal’s current network connection type.
     * Options: `WIFI`, `ETHERNET`
     *
     * @var ?string $networkConnectionType
     */
    #[JsonProperty('network_connection_type')]
    private ?string $networkConnectionType;

    /**
     * @var ?string $paymentRegion The country in which the Terminal is authorized to take payments.
     */
    #[JsonProperty('payment_region')]
    private ?string $paymentRegion;

    /**
     * The unique identifier assigned to the Terminal, which can be found on the lower back
     * of the device.
     *
     * @var ?string $serialNumber
     */
    #[JsonProperty('serial_number')]
    private ?string $serialNumber;

    /**
     * @var ?string $osVersion The current version of the Terminal’s operating system.
     */
    #[JsonProperty('os_version')]
    private ?string $osVersion;

    /**
     * @var ?string $appVersion The current version of the application running on the Terminal.
     */
    #[JsonProperty('app_version')]
    private ?string $appVersion;

    /**
     * @var ?string $wifiNetworkName The name of the Wi-Fi network to which the Terminal is connected.
     */
    #[JsonProperty('wifi_network_name')]
    private ?string $wifiNetworkName;

    /**
     * The signal strength of the Wi-FI network connection.
     * Options: `POOR`, `FAIR`, `GOOD`, `EXCELLENT`
     *
     * @var ?string $wifiNetworkStrength
     */
    #[JsonProperty('wifi_network_strength')]
    private ?string $wifiNetworkStrength;

    /**
     * @var ?string $ipAddress The IP address of the Terminal.
     */
    #[JsonProperty('ip_address')]
    private ?string $ipAddress;

    /**
     * @param array{
     *   batteryPercentage?: ?string,
     *   chargingState?: ?string,
     *   locationId?: ?string,
     *   merchantId?: ?string,
     *   networkConnectionType?: ?string,
     *   paymentRegion?: ?string,
     *   serialNumber?: ?string,
     *   osVersion?: ?string,
     *   appVersion?: ?string,
     *   wifiNetworkName?: ?string,
     *   wifiNetworkStrength?: ?string,
     *   ipAddress?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->batteryPercentage = $values['batteryPercentage'] ?? null;
        $this->chargingState = $values['chargingState'] ?? null;
        $this->locationId = $values['locationId'] ?? null;
        $this->merchantId = $values['merchantId'] ?? null;
        $this->networkConnectionType = $values['networkConnectionType'] ?? null;
        $this->paymentRegion = $values['paymentRegion'] ?? null;
        $this->serialNumber = $values['serialNumber'] ?? null;
        $this->osVersion = $values['osVersion'] ?? null;
        $this->appVersion = $values['appVersion'] ?? null;
        $this->wifiNetworkName = $values['wifiNetworkName'] ?? null;
        $this->wifiNetworkStrength = $values['wifiNetworkStrength'] ?? null;
        $this->ipAddress = $values['ipAddress'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getBatteryPercentage(): ?string
    {
        return $this->batteryPercentage;
    }

    /**
     * @param ?string $value
     */
    public function setBatteryPercentage(?string $value = null): self
    {
        $this->batteryPercentage = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getChargingState(): ?string
    {
        return $this->chargingState;
    }

    /**
     * @param ?string $value
     */
    public function setChargingState(?string $value = null): self
    {
        $this->chargingState = $value;
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
    public function getMerchantId(): ?string
    {
        return $this->merchantId;
    }

    /**
     * @param ?string $value
     */
    public function setMerchantId(?string $value = null): self
    {
        $this->merchantId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getNetworkConnectionType(): ?string
    {
        return $this->networkConnectionType;
    }

    /**
     * @param ?string $value
     */
    public function setNetworkConnectionType(?string $value = null): self
    {
        $this->networkConnectionType = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getPaymentRegion(): ?string
    {
        return $this->paymentRegion;
    }

    /**
     * @param ?string $value
     */
    public function setPaymentRegion(?string $value = null): self
    {
        $this->paymentRegion = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getSerialNumber(): ?string
    {
        return $this->serialNumber;
    }

    /**
     * @param ?string $value
     */
    public function setSerialNumber(?string $value = null): self
    {
        $this->serialNumber = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getOsVersion(): ?string
    {
        return $this->osVersion;
    }

    /**
     * @param ?string $value
     */
    public function setOsVersion(?string $value = null): self
    {
        $this->osVersion = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getAppVersion(): ?string
    {
        return $this->appVersion;
    }

    /**
     * @param ?string $value
     */
    public function setAppVersion(?string $value = null): self
    {
        $this->appVersion = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getWifiNetworkName(): ?string
    {
        return $this->wifiNetworkName;
    }

    /**
     * @param ?string $value
     */
    public function setWifiNetworkName(?string $value = null): self
    {
        $this->wifiNetworkName = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getWifiNetworkStrength(): ?string
    {
        return $this->wifiNetworkStrength;
    }

    /**
     * @param ?string $value
     */
    public function setWifiNetworkStrength(?string $value = null): self
    {
        $this->wifiNetworkStrength = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getIpAddress(): ?string
    {
        return $this->ipAddress;
    }

    /**
     * @param ?string $value
     */
    public function setIpAddress(?string $value = null): self
    {
        $this->ipAddress = $value;
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
