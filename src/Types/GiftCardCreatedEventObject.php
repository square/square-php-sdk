<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * An object that contains the gift card associated with a `gift_card.created` event.
 */
class GiftCardCreatedEventObject extends JsonSerializableType
{
    /**
     * @var ?GiftCard $giftCard The new gift card.
     */
    #[JsonProperty('gift_card')]
    private ?GiftCard $giftCard;

    /**
     * @param array{
     *   giftCard?: ?GiftCard,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->giftCard = $values['giftCard'] ?? null;
    }

    /**
     * @return ?GiftCard
     */
    public function getGiftCard(): ?GiftCard
    {
        return $this->giftCard;
    }

    /**
     * @param ?GiftCard $value
     */
    public function setGiftCard(?GiftCard $value = null): self
    {
        $this->giftCard = $value;
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
