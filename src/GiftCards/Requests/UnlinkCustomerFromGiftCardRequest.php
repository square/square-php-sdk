<?php

namespace Square\GiftCards\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class UnlinkCustomerFromGiftCardRequest extends JsonSerializableType
{
    /**
     * @var string $giftCardId The ID of the gift card to be unlinked.
     */
    private string $giftCardId;

    /**
     * @var string $customerId The ID of the customer to unlink from the gift card.
     */
    #[JsonProperty('customer_id')]
    private string $customerId;

    /**
     * @param array{
     *   giftCardId: string,
     *   customerId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->giftCardId = $values['giftCardId'];
        $this->customerId = $values['customerId'];
    }

    /**
     * @return string
     */
    public function getGiftCardId(): string
    {
        return $this->giftCardId;
    }

    /**
     * @param string $value
     */
    public function setGiftCardId(string $value): self
    {
        $this->giftCardId = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getCustomerId(): string
    {
        return $this->customerId;
    }

    /**
     * @param string $value
     */
    public function setCustomerId(string $value): self
    {
        $this->customerId = $value;
        return $this;
    }
}
