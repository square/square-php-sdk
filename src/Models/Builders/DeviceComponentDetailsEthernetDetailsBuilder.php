<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\DeviceComponentDetailsEthernetDetails;

/**
 * Builder for model DeviceComponentDetailsEthernetDetails
 *
 * @see DeviceComponentDetailsEthernetDetails
 */
class DeviceComponentDetailsEthernetDetailsBuilder
{
    /**
     * @var DeviceComponentDetailsEthernetDetails
     */
    private $instance;

    private function __construct(DeviceComponentDetailsEthernetDetails $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new device component details ethernet details Builder object.
     */
    public static function init(): self
    {
        return new self(new DeviceComponentDetailsEthernetDetails());
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
     * Initializes a new device component details ethernet details object.
     */
    public function build(): DeviceComponentDetailsEthernetDetails
    {
        return CoreHelper::clone($this->instance);
    }
}
