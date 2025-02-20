<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents details about a `TRANSFER_BALANCE_TO` [gift card activity type](entity:GiftCardActivityType).
 */
class GiftCardActivityTransferBalanceTo extends JsonSerializableType
{
    /**
     * @var string $transferFromGiftCardId The ID of the gift card from which the specified amount was transferred.
     */
    #[JsonProperty('transfer_from_gift_card_id')]
    private string $transferFromGiftCardId;

    /**
     * @var Money $amountMoney The amount added to the gift card balance for the transfer. This value is a positive integer.
     */
    #[JsonProperty('amount_money')]
    private Money $amountMoney;

    /**
     * @param array{
     *   transferFromGiftCardId: string,
     *   amountMoney: Money,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->transferFromGiftCardId = $values['transferFromGiftCardId'];
        $this->amountMoney = $values['amountMoney'];
    }

    /**
     * @return string
     */
    public function getTransferFromGiftCardId(): string
    {
        return $this->transferFromGiftCardId;
    }

    /**
     * @param string $value
     */
    public function setTransferFromGiftCardId(string $value): self
    {
        $this->transferFromGiftCardId = $value;
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
