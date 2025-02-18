<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents details about an `IMPORT` [gift card activity type](entity:GiftCardActivityType).
 * This activity type is used when Square imports a third-party gift card, in which case the
 * `gan_source` of the gift card is set to `OTHER`.
 */
class GiftCardActivityImport extends JsonSerializableType
{
    /**
     * @var Money $amountMoney The balance amount on the imported gift card.
     */
    #[JsonProperty('amount_money')]
    private Money $amountMoney;

    /**
     * @param array{
     *   amountMoney: Money,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->amountMoney = $values['amountMoney'];
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
