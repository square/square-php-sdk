<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * An object that contains the gift card associated with a `gift_card.updated` event.
 */
class GiftCardUpdatedEventObject extends JsonSerializableType
{
    /**
     * The gift card with the updated `balance_money`, `state`, or `customer_ids` field.
     * Some events can affect both `balance_money` and `state`.
     *
     * @var ?GiftCard $giftCard
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
