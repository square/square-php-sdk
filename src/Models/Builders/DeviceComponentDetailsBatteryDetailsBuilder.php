<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\DeviceComponentDetailsBatteryDetails;

/**
 * Builder for model DeviceComponentDetailsBatteryDetails
 *
 * @see DeviceComponentDetailsBatteryDetails
 */
class DeviceComponentDetailsBatteryDetailsBuilder
{
    /**
     * @var DeviceComponentDetailsBatteryDetails
     */
    private $instance;

    private function __construct(DeviceComponentDetailsBatteryDetails $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new device component details battery details Builder object.
     */
    public static function init(): self
    {
        return new self(new DeviceComponentDetailsBatteryDetails());
    }

    /**
     * Sets visible percent field.
     */
    public function visiblePercent(?int $value): self
    {
        $this->instance->setVisiblePercent($value);
        return $this;
    }

    /**
     * Unsets visible percent field.
     */
    public function unsetVisiblePercent(): self
    {
        $this->instance->unsetVisiblePercent();
        return $this;
    }

    /**
     * Sets external power field.
     */
    public function externalPower(?string $value): self
    {
        $this->instance->setExternalPower($value);
        return $this;
    }

    /**
     * Initializes a new device component details battery details object.
     */
    public function build(): DeviceComponentDetailsBatteryDetails
    {
        return CoreHelper::clone($this->instance);
    }
}
