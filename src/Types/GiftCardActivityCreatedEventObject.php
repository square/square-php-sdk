<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * An object that contains the gift card activity associated with a
 * `gift_card.activity.created` event.
 */
class GiftCardActivityCreatedEventObject extends JsonSerializableType
{
    /**
     * @var ?GiftCardActivity $giftCardActivity The new gift card activity.
     */
    #[JsonProperty('gift_card_activity')]
    private ?GiftCardActivity $giftCardActivity;

    /**
     * @param array{
     *   giftCardActivity?: ?GiftCardActivity,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->giftCardActivity = $values['giftCardActivity'] ?? null;
    }

    /**
     * @return ?GiftCardActivity
     */
    public function getGiftCardActivity(): ?GiftCardActivity
    {
        return $this->giftCardActivity;
    }

    /**
     * @param ?GiftCardActivity $value
     */
    public function setGiftCardActivity(?GiftCardActivity $value = null): self
    {
        $this->giftCardActivity = $value;
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
