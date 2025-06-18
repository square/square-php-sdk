<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * An object that contains the gift card and customer ID associated with a
 * `gift_card.customer_linked` event.
 */
class GiftCardCustomerLinkedEventObject extends JsonSerializableType
{
    /**
     * @var ?GiftCard $giftCard The gift card with the updated `customer_ids` field.
     */
    #[JsonProperty('gift_card')]
    private ?GiftCard $giftCard;

    /**
     * @var ?string $linkedCustomerId The ID of the linked [customer](entity:Customer).
     */
    #[JsonProperty('linked_customer_id')]
    private ?string $linkedCustomerId;

    /**
     * @param array{
     *   giftCard?: ?GiftCard,
     *   linkedCustomerId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->giftCard = $values['giftCard'] ?? null;
        $this->linkedCustomerId = $values['linkedCustomerId'] ?? null;
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
     * @return ?string
     */
    public function getLinkedCustomerId(): ?string
    {
        return $this->linkedCustomerId;
    }

    /**
     * @param ?string $value
     */
    public function setLinkedCustomerId(?string $value = null): self
    {
        $this->linkedCustomerId = $value;
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
