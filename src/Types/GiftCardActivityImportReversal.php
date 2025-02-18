<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents details about an `IMPORT_REVERSAL` [gift card activity type](entity:GiftCardActivityType).
 */
class GiftCardActivityImportReversal extends JsonSerializableType
{
    /**
     * The amount of money cleared from the third-party gift card when
     * the import was reversed.
     *
     * @var Money $amountMoney
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
