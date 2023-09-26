<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\DeviceComponentDetailsMeasurement;

/**
 * Builder for model DeviceComponentDetailsMeasurement
 *
 * @see DeviceComponentDetailsMeasurement
 */
class DeviceComponentDetailsMeasurementBuilder
{
    /**
     * @var DeviceComponentDetailsMeasurement
     */
    private $instance;

    private function __construct(DeviceComponentDetailsMeasurement $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new device component details measurement Builder object.
     */
    public static function init(): self
    {
        return new self(new DeviceComponentDetailsMeasurement());
    }

    /**
     * Sets value field.
     */
    public function value(?int $value): self
    {
        $this->instance->setValue($value);
        return $this;
    }

    /**
     * Unsets value field.
     */
    public function unsetValue(): self
    {
        $this->instance->unsetValue();
        return $this;
    }

    /**
     * Initializes a new device component details measurement object.
     */
    public function build(): DeviceComponentDetailsMeasurement
    {
        return CoreHelper::clone($this->instance);
    }
}
