<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents details about an `ADJUST_INCREMENT` [gift card activity type](entity:GiftCardActivityType).
 */
class GiftCardActivityAdjustIncrement extends JsonSerializableType
{
    /**
     * @var Money $amountMoney The amount added to the gift card balance. This value is a positive integer.
     */
    #[JsonProperty('amount_money')]
    private Money $amountMoney;

    /**
     * The reason the gift card balance was adjusted.
     * See [Reason](#type-reason) for possible values
     *
     * @var value-of<GiftCardActivityAdjustIncrementReason> $reason
     */
    #[JsonProperty('reason')]
    private string $reason;

    /**
     * @param array{
     *   amountMoney: Money,
     *   reason: value-of<GiftCardActivityAdjustIncrementReason>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->amountMoney = $values['amountMoney'];
        $this->reason = $values['reason'];
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
     * @return value-of<GiftCardActivityAdjustIncrementReason>
     */
    public function getReason(): string
    {
        return $this->reason;
    }

    /**
     * @param value-of<GiftCardActivityAdjustIncrementReason> $value
     */
    public function setReason(string $value): self
    {
        $this->reason = $value;
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
