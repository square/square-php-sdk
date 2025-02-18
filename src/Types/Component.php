<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * The wrapper object for the component entries of a given component type.
 */
class Component extends JsonSerializableType
{
    /**
     * The type of this component. Each component type has expected properties expressed
     * in a structured format within its corresponding `*_details` field.
     * See [ComponentType](#type-componenttype) for possible values
     *
     * @var value-of<ComponentComponentType> $type
     */
    #[JsonProperty('type')]
    private string $type;

    /**
     * @var ?DeviceComponentDetailsApplicationDetails $applicationDetails Structured data for an `Application`, set for Components of type `APPLICATION`.
     */
    #[JsonProperty('application_details')]
    private ?DeviceComponentDetailsApplicationDetails $applicationDetails;

    /**
     * @var ?DeviceComponentDetailsCardReaderDetails $cardReaderDetails Structured data for a `CardReader`, set for Components of type `CARD_READER`.
     */
    #[JsonProperty('card_reader_details')]
    private ?DeviceComponentDetailsCardReaderDetails $cardReaderDetails;

    /**
     * @var ?DeviceComponentDetailsBatteryDetails $batteryDetails Structured data for a `Battery`, set for Components of type `BATTERY`.
     */
    #[JsonProperty('battery_details')]
    private ?DeviceComponentDetailsBatteryDetails $batteryDetails;

    /**
     * @var ?DeviceComponentDetailsWiFiDetails $wifiDetails Structured data for a `WiFi` interface, set for Components of type `WIFI`.
     */
    #[JsonProperty('wifi_details')]
    private ?DeviceComponentDetailsWiFiDetails $wifiDetails;

    /**
     * @var ?DeviceComponentDetailsEthernetDetails $ethernetDetails Structured data for an `Ethernet` interface, set for Components of type `ETHERNET`.
     */
    #[JsonProperty('ethernet_details')]
    private ?DeviceComponentDetailsEthernetDetails $ethernetDetails;

    /**
     * @param array{
     *   type: value-of<ComponentComponentType>,
     *   applicationDetails?: ?DeviceComponentDetailsApplicationDetails,
     *   cardReaderDetails?: ?DeviceComponentDetailsCardReaderDetails,
     *   batteryDetails?: ?DeviceComponentDetailsBatteryDetails,
     *   wifiDetails?: ?DeviceComponentDetailsWiFiDetails,
     *   ethernetDetails?: ?DeviceComponentDetailsEthernetDetails,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->type = $values['type'];
        $this->applicationDetails = $values['applicationDetails'] ?? null;
        $this->cardReaderDetails = $values['cardReaderDetails'] ?? null;
        $this->batteryDetails = $values['batteryDetails'] ?? null;
        $this->wifiDetails = $values['wifiDetails'] ?? null;
        $this->ethernetDetails = $values['ethernetDetails'] ?? null;
    }

    /**
     * @return value-of<ComponentComponentType>
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param value-of<ComponentComponentType> $value
     */
    public function setType(string $value): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return ?DeviceComponentDetailsApplicationDetails
     */
    public function getApplicationDetails(): ?DeviceComponentDetailsApplicationDetails
    {
        return $this->applicationDetails;
    }

    /**
     * @param ?DeviceComponentDetailsApplicationDetails $value
     */
    public function setApplicationDetails(?DeviceComponentDetailsApplicationDetails $value = null): self
    {
        $this->applicationDetails = $value;
        return $this;
    }

    /**
     * @return ?DeviceComponentDetailsCardReaderDetails
     */
    public function getCardReaderDetails(): ?DeviceComponentDetailsCardReaderDetails
    {
        return $this->cardReaderDetails;
    }

    /**
     * @param ?DeviceComponentDetailsCardReaderDetails $value
     */
    public function setCardReaderDetails(?DeviceComponentDetailsCardReaderDetails $value = null): self
    {
        $this->cardReaderDetails = $value;
        return $this;
    }

    /**
     * @return ?DeviceComponentDetailsBatteryDetails
     */
    public function getBatteryDetails(): ?DeviceComponentDetailsBatteryDetails
    {
        return $this->batteryDetails;
    }

    /**
     * @param ?DeviceComponentDetailsBatteryDetails $value
     */
    public function setBatteryDetails(?DeviceComponentDetailsBatteryDetails $value = null): self
    {
        $this->batteryDetails = $value;
        return $this;
    }

    /**
     * @return ?DeviceComponentDetailsWiFiDetails
     */
    public function getWifiDetails(): ?DeviceComponentDetailsWiFiDetails
    {
        return $this->wifiDetails;
    }

    /**
     * @param ?DeviceComponentDetailsWiFiDetails $value
     */
    public function setWifiDetails(?DeviceComponentDetailsWiFiDetails $value = null): self
    {
        $this->wifiDetails = $value;
        return $this;
    }

    /**
     * @return ?DeviceComponentDetailsEthernetDetails
     */
    public function getEthernetDetails(): ?DeviceComponentDetailsEthernetDetails
    {
        return $this->ethernetDetails;
    }

    /**
     * @param ?DeviceComponentDetailsEthernetDetails $value
     */
    public function setEthernetDetails(?DeviceComponentDetailsEthernetDetails $value = null): self
    {
        $this->ethernetDetails = $value;
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
