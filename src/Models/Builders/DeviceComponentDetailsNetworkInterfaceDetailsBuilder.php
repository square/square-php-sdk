<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\DeviceComponentDetailsNetworkInterfaceDetails;

/**
 * Builder for model DeviceComponentDetailsNetworkInterfaceDetails
 *
 * @see DeviceComponentDetailsNetworkInterfaceDetails
 */
class DeviceComponentDetailsNetworkInterfaceDetailsBuilder
{
    /**
     * @var DeviceComponentDetailsNetworkInterfaceDetails
     */
    private $instance;

    private function __construct(DeviceComponentDetailsNetworkInterfaceDetails $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new device component details network interface details Builder object.
     */
    public static function init(): self
    {
        return new self(new DeviceComponentDetailsNetworkInterfaceDetails());
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
     * Initializes a new device component details network interface details object.
     */
    public function build(): DeviceComponentDetailsNetworkInterfaceDetails
    {
        return CoreHelper::clone($this->instance);
    }
}
