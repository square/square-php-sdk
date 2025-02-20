<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class ShippingFee extends JsonSerializableType
{
    /**
     * @var ?string $name The name for the shipping fee.
     */
    #[JsonProperty('name')]
    private ?string $name;

    /**
     * @var Money $charge The amount and currency for the shipping fee.
     */
    #[JsonProperty('charge')]
    private Money $charge;

    /**
     * @param array{
     *   charge: Money,
     *   name?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'] ?? null;
        $this->charge = $values['charge'];
    }

    /**
     * @return ?string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param ?string $value
     */
    public function setName(?string $value = null): self
    {
        $this->name = $value;
        return $this;
    }

    /**
     * @return Money
     */
    public function getCharge(): Money
    {
        return $this->charge;
    }

    /**
     * @param Money $value
     */
    public function setCharge(Money $value): self
    {
        $this->charge = $value;
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
