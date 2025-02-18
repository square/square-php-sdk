<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Stores details about a cash payment. Contains only non-confidential information. For more information, see
 * [Take Cash Payments](https://developer.squareup.com/docs/payments-api/take-payments/cash-payments).
 */
class CashPaymentDetails extends JsonSerializableType
{
    /**
     * @var Money $buyerSuppliedMoney The amount and currency of the money supplied by the buyer.
     */
    #[JsonProperty('buyer_supplied_money')]
    private Money $buyerSuppliedMoney;

    /**
     * The amount of change due back to the buyer.
     * This read-only field is calculated
     * from the `amount_money` and `buyer_supplied_money` fields.
     *
     * @var ?Money $changeBackMoney
     */
    #[JsonProperty('change_back_money')]
    private ?Money $changeBackMoney;

    /**
     * @param array{
     *   buyerSuppliedMoney: Money,
     *   changeBackMoney?: ?Money,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->buyerSuppliedMoney = $values['buyerSuppliedMoney'];
        $this->changeBackMoney = $values['changeBackMoney'] ?? null;
    }

    /**
     * @return Money
     */
    public function getBuyerSuppliedMoney(): Money
    {
        return $this->buyerSuppliedMoney;
    }

    /**
     * @param Money $value
     */
    public function setBuyerSuppliedMoney(Money $value): self
    {
        $this->buyerSuppliedMoney = $value;
        return $this;
    }

    /**
     * @return ?Money
     */
    public function getChangeBackMoney(): ?Money
    {
        return $this->changeBackMoney;
    }

    /**
     * @param ?Money $value
     */
    public function setChangeBackMoney(?Money $value = null): self
    {
        $this->changeBackMoney = $value;
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
