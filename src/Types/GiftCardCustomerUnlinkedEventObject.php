<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * An object that contains the gift card and the customer ID associated with a
 * `gift_card.customer_linked` event.
 */
class GiftCardCustomerUnlinkedEventObject extends JsonSerializableType
{
    /**
     * The gift card with the updated `customer_ids` field.
     * The field is removed if the gift card is not linked to any customers.
     *
     * @var ?GiftCard $giftCard
     */
    #[JsonProperty('gift_card')]
    private ?GiftCard $giftCard;

    /**
     * @var ?string $unlinkedCustomerId The ID of the unlinked [customer](entity:Customer).
     */
    #[JsonProperty('unlinked_customer_id')]
    private ?string $unlinkedCustomerId;

    /**
     * @param array{
     *   giftCard?: ?GiftCard,
     *   unlinkedCustomerId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->giftCard = $values['giftCard'] ?? null;
        $this->unlinkedCustomerId = $values['unlinkedCustomerId'] ?? null;
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
    public function getUnlinkedCustomerId(): ?string
    {
        return $this->unlinkedCustomerId;
    }

    /**
     * @param ?string $value
     */
    public function setUnlinkedCustomerId(?string $value = null): self
    {
        $this->unlinkedCustomerId = $value;
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
