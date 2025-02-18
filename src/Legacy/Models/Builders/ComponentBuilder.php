<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\Component;
use Square\Legacy\Models\DeviceComponentDetailsApplicationDetails;
use Square\Legacy\Models\DeviceComponentDetailsBatteryDetails;
use Square\Legacy\Models\DeviceComponentDetailsCardReaderDetails;
use Square\Legacy\Models\DeviceComponentDetailsEthernetDetails;
use Square\Legacy\Models\DeviceComponentDetailsWiFiDetails;

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
     * Initializes a new Component Builder object.
     *
     * @param string $type
     */
    public static function init(string $type): self
    {
        return new self(new Component($type));
    }

    /**
     * Sets application details field.
     *
     * @param DeviceComponentDetailsApplicationDetails|null $value
     */
    public function applicationDetails(?DeviceComponentDetailsApplicationDetails $value): self
    {
        $this->instance->setApplicationDetails($value);
        return $this;
    }

    /**
     * Sets card reader details field.
     *
     * @param DeviceComponentDetailsCardReaderDetails|null $value
     */
    public function cardReaderDetails(?DeviceComponentDetailsCardReaderDetails $value): self
    {
        $this->instance->setCardReaderDetails($value);
        return $this;
    }

    /**
     * Sets battery details field.
     *
     * @param DeviceComponentDetailsBatteryDetails|null $value
     */
    public function batteryDetails(?DeviceComponentDetailsBatteryDetails $value): self
    {
        $this->instance->setBatteryDetails($value);
        return $this;
    }

    /**
     * Sets wifi details field.
     *
     * @param DeviceComponentDetailsWiFiDetails|null $value
     */
    public function wifiDetails(?DeviceComponentDetailsWiFiDetails $value): self
    {
        $this->instance->setWifiDetails($value);
        return $this;
    }

    /**
     * Sets ethernet details field.
     *
     * @param DeviceComponentDetailsEthernetDetails|null $value
     */
    public function ethernetDetails(?DeviceComponentDetailsEthernetDetails $value): self
    {
        $this->instance->setEthernetDetails($value);
        return $this;
    }

    /**
     * Initializes a new Component object.
     */
    public function build(): Component
    {
        return CoreHelper::clone($this->instance);
    }
}
