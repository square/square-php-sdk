<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\DeviceStatus;

/**
 * Builder for model DeviceStatus
 *
 * @see DeviceStatus
 */
class DeviceStatusBuilder
{
    /**
     * @var DeviceStatus
     */
    private $instance;

    private function __construct(DeviceStatus $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new device status Builder object.
     */
    public static function init(): self
    {
        return new self(new DeviceStatus());
    }

    /**
     * Sets category field.
     */
    public function category(?string $value): self
    {
        $this->instance->setCategory($value);
        return $this;
    }

    /**
     * Initializes a new device status object.
     */
    public function build(): DeviceStatus
    {
        return CoreHelper::clone($this->instance);
    }
}
