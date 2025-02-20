<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents details about a `TRANSFER_BALANCE_FROM` [gift card activity type](entity:GiftCardActivityType).
 */
class GiftCardActivityTransferBalanceFrom extends JsonSerializableType
{
    /**
     * @var string $transferToGiftCardId The ID of the gift card to which the specified amount was transferred.
     */
    #[JsonProperty('transfer_to_gift_card_id')]
    private string $transferToGiftCardId;

    /**
     * @var Money $amountMoney The amount deducted from the gift card for the transfer. This value is a positive integer.
     */
    #[JsonProperty('amount_money')]
    private Money $amountMoney;

    /**
     * @param array{
     *   transferToGiftCardId: string,
     *   amountMoney: Money,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->transferToGiftCardId = $values['transferToGiftCardId'];
        $this->amountMoney = $values['amountMoney'];
    }

    /**
     * @return string
     */
    public function getTransferToGiftCardId(): string
    {
        return $this->transferToGiftCardId;
    }

    /**
     * @param string $value
     */
    public function setTransferToGiftCardId(string $value): self
    {
        $this->transferToGiftCardId = $value;
        return $this;
    }

    /**
     * @return Money
     */
    public function getAmountMoney(): Money
    {
        return $this->amountMoney;
    }

    /**
     * @param Money $value
     */
    public function setAmountMoney(Money $value): self
    {
        $this->amountMoney = $value;
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
