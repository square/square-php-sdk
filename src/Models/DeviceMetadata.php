<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

class DeviceMetadata implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $batteryPercentage;

    /**
     * @var string|null
     */
    private $chargingState;

    /**
     * @var string|null
     */
    private $locationId;

    /**
     * @var string|null
     */
    private $merchantId;

    /**
     * @var string|null
     */
    private $networkConnectionType;

    /**
     * @var string|null
     */
    private $paymentRegion;

    /**
     * @var string|null
     */
    private $serialNumber;

    /**
     * @var string|null
     */
    private $osVersion;

    /**
     * @var string|null
     */
    private $appVersion;

    /**
     * @var string|null
     */
    private $wifiNetworkName;

    /**
     * @var string|null
     */
    private $wifiNetworkStrength;

    /**
     * @var string|null
     */
    private $ipAddress;

    /**
     * Returns Battery Percentage.
     * The Terminal’s remaining battery percentage, between 1-100.
     */
    public function getBatteryPercentage(): ?string
    {
        return $this->batteryPercentage;
    }

    /**
     * Sets Battery Percentage.
     * The Terminal’s remaining battery percentage, between 1-100.
     *
     * @maps battery_percentage
     */
    public function setBatteryPercentage(?string $batteryPercentage): void
    {
        $this->batteryPercentage = $batteryPercentage;
    }

    /**
     * Returns Charging State.
     * The current charging state of the Terminal.
     * Options: `CHARGING`, `NOT_CHARGING`
     */
    public function getChargingState(): ?string
    {
        return $this->chargingState;
    }

    /**
     * Sets Charging State.
     * The current charging state of the Terminal.
     * Options: `CHARGING`, `NOT_CHARGING`
     *
     * @maps charging_state
     */
    public function setChargingState(?string $chargingState): void
    {
        $this->chargingState = $chargingState;
    }

    /**
     * Returns Location Id.
     * The ID of the Square seller business location associated with the Terminal.
     */
    public function getLocationId(): ?string
    {
        return $this->locationId;
    }

    /**
     * Sets Location Id.
     * The ID of the Square seller business location associated with the Terminal.
     *
     * @maps location_id
     */
    public function setLocationId(?string $locationId): void
    {
        $this->locationId = $locationId;
    }

    /**
     * Returns Merchant Id.
     * The ID of the Square merchant account that is currently signed-in to the Terminal.
     */
    public function getMerchantId(): ?string
    {
        return $this->merchantId;
    }

    /**
     * Sets Merchant Id.
     * The ID of the Square merchant account that is currently signed-in to the Terminal.
     *
     * @maps merchant_id
     */
    public function setMerchantId(?string $merchantId): void
    {
        $this->merchantId = $merchantId;
    }

    /**
     * Returns Network Connection Type.
     * The Terminal’s current network connection type.
     * Options: `WIFI`, `ETHERNET`
     */
    public function getNetworkConnectionType(): ?string
    {
        return $this->networkConnectionType;
    }

    /**
     * Sets Network Connection Type.
     * The Terminal’s current network connection type.
     * Options: `WIFI`, `ETHERNET`
     *
     * @maps network_connection_type
     */
    public function setNetworkConnectionType(?string $networkConnectionType): void
    {
        $this->networkConnectionType = $networkConnectionType;
    }

    /**
     * Returns Payment Region.
     * The country in which the Terminal is authorized to take payments.
     */
    public function getPaymentRegion(): ?string
    {
        return $this->paymentRegion;
    }

    /**
     * Sets Payment Region.
     * The country in which the Terminal is authorized to take payments.
     *
     * @maps payment_region
     */
    public function setPaymentRegion(?string $paymentRegion): void
    {
        $this->paymentRegion = $paymentRegion;
    }

    /**
     * Returns Serial Number.
     * The unique identifier assigned to the Terminal, which can be found on the lower back
     * of the device.
     */
    public function getSerialNumber(): ?string
    {
        return $this->serialNumber;
    }

    /**
     * Sets Serial Number.
     * The unique identifier assigned to the Terminal, which can be found on the lower back
     * of the device.
     *
     * @maps serial_number
     */
    public function setSerialNumber(?string $serialNumber): void
    {
        $this->serialNumber = $serialNumber;
    }

    /**
     * Returns Os Version.
     * The current version of the Terminal’s operating system.
     */
    public function getOsVersion(): ?string
    {
        return $this->osVersion;
    }

    /**
     * Sets Os Version.
     * The current version of the Terminal’s operating system.
     *
     * @maps os_version
     */
    public function setOsVersion(?string $osVersion): void
    {
        $this->osVersion = $osVersion;
    }

    /**
     * Returns App Version.
     * The current version of the application running on the Terminal.
     */
    public function getAppVersion(): ?string
    {
        return $this->appVersion;
    }

    /**
     * Sets App Version.
     * The current version of the application running on the Terminal.
     *
     * @maps app_version
     */
    public function setAppVersion(?string $appVersion): void
    {
        $this->appVersion = $appVersion;
    }

    /**
     * Returns Wifi Network Name.
     * The name of the Wi-Fi network to which the Terminal is connected.
     */
    public function getWifiNetworkName(): ?string
    {
        return $this->wifiNetworkName;
    }

    /**
     * Sets Wifi Network Name.
     * The name of the Wi-Fi network to which the Terminal is connected.
     *
     * @maps wifi_network_name
     */
    public function setWifiNetworkName(?string $wifiNetworkName): void
    {
        $this->wifiNetworkName = $wifiNetworkName;
    }

    /**
     * Returns Wifi Network Strength.
     * The signal strength of the Wi-FI network connection.
     * Options: `POOR`, `FAIR`, `GOOD`, `EXCELLENT`
     */
    public function getWifiNetworkStrength(): ?string
    {
        return $this->wifiNetworkStrength;
    }

    /**
     * Sets Wifi Network Strength.
     * The signal strength of the Wi-FI network connection.
     * Options: `POOR`, `FAIR`, `GOOD`, `EXCELLENT`
     *
     * @maps wifi_network_strength
     */
    public function setWifiNetworkStrength(?string $wifiNetworkStrength): void
    {
        $this->wifiNetworkStrength = $wifiNetworkStrength;
    }

    /**
     * Returns Ip Address.
     * The IP address of the Terminal.
     */
    public function getIpAddress(): ?string
    {
        return $this->ipAddress;
    }

    /**
     * Sets Ip Address.
     * The IP address of the Terminal.
     *
     * @maps ip_address
     */
    public function setIpAddress(?string $ipAddress): void
    {
        $this->ipAddress = $ipAddress;
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
        if (isset($this->batteryPercentage)) {
            $json['battery_percentage']      = $this->batteryPercentage;
        }
        if (isset($this->chargingState)) {
            $json['charging_state']          = $this->chargingState;
        }
        if (isset($this->locationId)) {
            $json['location_id']             = $this->locationId;
        }
        if (isset($this->merchantId)) {
            $json['merchant_id']             = $this->merchantId;
        }
        if (isset($this->networkConnectionType)) {
            $json['network_connection_type'] = $this->networkConnectionType;
        }
        if (isset($this->paymentRegion)) {
            $json['payment_region']          = $this->paymentRegion;
        }
        if (isset($this->serialNumber)) {
            $json['serial_number']           = $this->serialNumber;
        }
        if (isset($this->osVersion)) {
            $json['os_version']              = $this->osVersion;
        }
        if (isset($this->appVersion)) {
            $json['app_version']             = $this->appVersion;
        }
        if (isset($this->wifiNetworkName)) {
            $json['wifi_network_name']       = $this->wifiNetworkName;
        }
        if (isset($this->wifiNetworkStrength)) {
            $json['wifi_network_strength']   = $this->wifiNetworkStrength;
        }
        if (isset($this->ipAddress)) {
            $json['ip_address']              = $this->ipAddress;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
