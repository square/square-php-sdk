<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class TerminalCheckoutCreatedEventObject extends JsonSerializableType
{
    /**
     * @var ?TerminalCheckout $checkout The created terminal checkout
     */
    #[JsonProperty('checkout')]
    private ?TerminalCheckout $checkout;

    /**
     * @param array{
     *   checkout?: ?TerminalCheckout,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->checkout = $values['checkout'] ?? null;
    }

    /**
     * @return ?TerminalCheckout
     */
    public function getCheckout(): ?TerminalCheckout
    {
        return $this->checkout;
    }

    /**
     * @param ?TerminalCheckout $value
     */
    public function setCheckout(?TerminalCheckout $value = null): self
    {
        $this->checkout = $value;
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
