<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\DeviceComponentDetailsMeasurement;
use Square\Models\DeviceComponentDetailsWiFiDetails;

/**
 * Builder for model DeviceComponentDetailsWiFiDetails
 *
 * @see DeviceComponentDetailsWiFiDetails
 */
class DeviceComponentDetailsWiFiDetailsBuilder
{
    /**
     * @var DeviceComponentDetailsWiFiDetails
     */
    private $instance;

    private function __construct(DeviceComponentDetailsWiFiDetails $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new device component details wi fi details Builder object.
     */
    public static function init(): self
    {
        return new self(new DeviceComponentDetailsWiFiDetails());
    }

    /**
     * Sets active field.
     */
    public function active(?bool $value): self
    {
        $this->instance->setActive($value);
        return $this;
    }

    /**
     * Unsets active field.
     */
    public function unsetActive(): self
    {
        $this->instance->unsetActive();
        return $this;
    }

    /**
     * Sets ssid field.
     */
    public function ssid(?string $value): self
    {
        $this->instance->setSsid($value);
        return $this;
    }

    /**
     * Unsets ssid field.
     */
    public function unsetSsid(): self
    {
        $this->instance->unsetSsid();
        return $this;
    }

    /**
     * Sets ip address v 4 field.
     */
    public function ipAddressV4(?string $value): self
    {
        $this->instance->setIpAddressV4($value);
        return $this;
    }

    /**
     * Unsets ip address v 4 field.
     */
    public function unsetIpAddressV4(): self
    {
        $this->instance->unsetIpAddressV4();
        return $this;
    }

    /**
     * Sets secure connection field.
     */
    public function secureConnection(?string $value): self
    {
        $this->instance->setSecureConnection($value);
        return $this;
    }

    /**
     * Unsets secure connection field.
     */
    public function unsetSecureConnection(): self
    {
        $this->instance->unsetSecureConnection();
        return $this;
    }

    /**
     * Sets signal strength field.
     */
    public function signalStrength(?DeviceComponentDetailsMeasurement $value): self
    {
        $this->instance->setSignalStrength($value);
        return $this;
    }

    /**
     * Initializes a new device component details wi fi details object.
     */
    public function build(): DeviceComponentDetailsWiFiDetails
    {
        return CoreHelper::clone($this->instance);
    }
}
