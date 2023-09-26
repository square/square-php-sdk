<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\Device;
use Square\Models\DeviceAttributes;
use Square\Models\DeviceStatus;

/**
 * Builder for model Device
 *
 * @see Device
 */
class DeviceBuilder
{
    /**
     * @var Device
     */
    private $instance;

    private function __construct(Device $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new device Builder object.
     */
    public static function init(DeviceAttributes $attributes): self
    {
        return new self(new Device($attributes));
    }

    /**
     * Sets id field.
     */
    public function id(?string $value): self
    {
        $this->instance->setId($value);
        return $this;
    }

    /**
     * Sets components field.
     */
    public function components(?array $value): self
    {
        $this->instance->setComponents($value);
        return $this;
    }

    /**
     * Unsets components field.
     */
    public function unsetComponents(): self
    {
        $this->instance->unsetComponents();
        return $this;
    }

    /**
     * Sets status field.
     */
    public function status(?DeviceStatus $value): self
    {
        $this->instance->setStatus($value);
        return $this;
    }

    /**
     * Initializes a new device object.
     */
    public function build(): Device
    {
        return CoreHelper::clone($this->instance);
    }
}
