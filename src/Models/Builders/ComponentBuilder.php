<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\Component;
use Square\Models\DeviceComponentDetailsApplicationDetails;
use Square\Models\DeviceComponentDetailsBatteryDetails;
use Square\Models\DeviceComponentDetailsCardReaderDetails;
use Square\Models\DeviceComponentDetailsEthernetDetails;
use Square\Models\DeviceComponentDetailsWiFiDetails;

/**
 * Builder for model Component
 *
 * @see Component
 */
class ComponentBuilder
{
    /**
     * @var Component
     */
    private $instance;

    private function __construct(Component $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new component Builder object.
     */
    public static function init(string $type): self
    {
        return new self(new Component($type));
    }

    /**
     * Sets application details field.
     */
    public function applicationDetails(?DeviceComponentDetailsApplicationDetails $value): self
    {
        $this->instance->setApplicationDetails($value);
        return $this;
    }

    /**
     * Sets card reader details field.
     */
    public function cardReaderDetails(?DeviceComponentDetailsCardReaderDetails $value): self
    {
        $this->instance->setCardReaderDetails($value);
        return $this;
    }

    /**
     * Sets battery details field.
     */
    public function batteryDetails(?DeviceComponentDetailsBatteryDetails $value): self
    {
        $this->instance->setBatteryDetails($value);
        return $this;
    }

    /**
     * Sets wifi details field.
     */
    public function wifiDetails(?DeviceComponentDetailsWiFiDetails $value): self
    {
        $this->instance->setWifiDetails($value);
        return $this;
    }

    /**
     * Sets ethernet details field.
     */
    public function ethernetDetails(?DeviceComponentDetailsEthernetDetails $value): self
    {
        $this->instance->setEthernetDetails($value);
        return $this;
    }

    /**
     * Initializes a new component object.
     */
    public function build(): Component
    {
        return CoreHelper::clone($this->instance);
    }
}
