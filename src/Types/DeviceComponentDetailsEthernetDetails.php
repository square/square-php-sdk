<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class DeviceComponentDetailsEthernetDetails extends JsonSerializableType
{
    /**
     * @var ?bool $active A boolean to represent whether the Ethernet interface is currently active.
     */
    #[JsonProperty('active')]
    private ?bool $active;

    /**
     * @var ?string $ipAddressV4 The string representation of the device’s IPv4 address.
     */
    #[JsonProperty('ip_address_v4')]
    private ?string $ipAddressV4;

    /**
     * @param array{
     *   active?: ?bool,
     *   ipAddressV4?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->active = $values['active'] ?? null;
        $this->ipAddressV4 = $values['ipAddressV4'] ?? null;
    }

    /**
     * @return ?bool
     */
    public function getActive(): ?bool
    {
        return $this->active;
    }

    /**
     * @param ?bool $value
     */
    public function setActive(?bool $value = null): self
    {
        $this->active = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getIpAddressV4(): ?string
    {
        return $this->ipAddressV4;
    }

    /**
     * @param ?string $value
     */
    public function setIpAddressV4(?string $value = null): self
    {
        $this->ipAddressV4 = $value;
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
