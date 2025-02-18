<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents the details of a tender with `type` `CASH`.
 */
class TenderCashDetails extends JsonSerializableType
{
    /**
     * @var ?Money $buyerTenderedMoney The total amount of cash provided by the buyer, before change is given.
     */
    #[JsonProperty('buyer_tendered_money')]
    private ?Money $buyerTenderedMoney;

    /**
     * @var ?Money $changeBackMoney The amount of change returned to the buyer.
     */
    #[JsonProperty('change_back_money')]
    private ?Money $changeBackMoney;

    /**
     * @param array{
     *   buyerTenderedMoney?: ?Money,
     *   changeBackMoney?: ?Money,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->buyerTenderedMoney = $values['buyerTenderedMoney'] ?? null;
        $this->changeBackMoney = $values['changeBackMoney'] ?? null;
    }

    /**
     * @return ?Money
     */
    public function getBuyerTenderedMoney(): ?Money
    {
        return $this->buyerTenderedMoney;
    }

    /**
     * @param ?Money $value
     */
    public function setBuyerTenderedMoney(?Money $value = null): self
    {
        $this->buyerTenderedMoney = $value;
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
