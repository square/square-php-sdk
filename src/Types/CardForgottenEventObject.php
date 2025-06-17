<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class CardForgottenEventObject extends JsonSerializableType
{
    /**
     * @var ?CardForgottenEventCard $card The forgotten card.
     */
    #[JsonProperty('card')]
    private ?CardForgottenEventCard $card;

    /**
     * @param array{
     *   card?: ?CardForgottenEventCard,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->card = $values['card'] ?? null;
    }

    /**
     * @return ?CardForgottenEventCard
     */
    public function getCard(): ?CardForgottenEventCard
    {
        return $this->card;
    }

    /**
     * @param ?CardForgottenEventCard $value
     */
    public function setCard(?CardForgottenEventCard $value = null): self
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
