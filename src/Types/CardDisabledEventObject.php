<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class CardDisabledEventObject extends JsonSerializableType
{
    /**
     * @var ?Card $card The disabled card.
     */
    #[JsonProperty('card')]
    private ?Card $card;

    /**
     * @param array{
     *   card?: ?Card,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->card = $values['card'] ?? null;
    }

    /**
     * @return ?Card
     */
    public function getCard(): ?Card
    {
        return $this->card;
    }

    /**
     * @param ?Card $value
     */
    public function setCard(?Card $value = null): self
    {
        $this->card = $value;
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
