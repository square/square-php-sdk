<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Stores details about a cash refund. Contains only non-confidential information.
 */
class DestinationDetailsCashRefundDetails extends JsonSerializableType
{
    /**
     * @var Money $sellerSuppliedMoney The amount and currency of the money supplied by the seller.
     */
    #[JsonProperty('seller_supplied_money')]
    private Money $sellerSuppliedMoney;

    /**
     * The amount of change due back to the seller.
     * This read-only field is calculated
     * from the `amount_money` and `seller_supplied_money` fields.
     *
     * @var ?Money $changeBackMoney
     */
    #[JsonProperty('change_back_money')]
    private ?Money $changeBackMoney;

    /**
     * @param array{
     *   sellerSuppliedMoney: Money,
     *   changeBackMoney?: ?Money,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->sellerSuppliedMoney = $values['sellerSuppliedMoney'];
        $this->changeBackMoney = $values['changeBackMoney'] ?? null;
    }

    /**
     * @return Money
     */
    public function getSellerSuppliedMoney(): Money
    {
        return $this->sellerSuppliedMoney;
    }

    /**
     * @param Money $value
     */
    public function setSellerSuppliedMoney(Money $value): self
    {
        $this->sellerSuppliedMoney = $value;
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
