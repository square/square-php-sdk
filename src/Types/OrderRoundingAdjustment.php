<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * A rounding adjustment of the money being returned. Commonly used to apply cash rounding
 * when the minimum unit of the account is smaller than the lowest physical denomination of the currency.
 */
class OrderRoundingAdjustment extends JsonSerializableType
{
    /**
     * @var ?string $uid A unique ID that identifies the rounding adjustment only within this order.
     */
    #[JsonProperty('uid')]
    private ?string $uid;

    /**
     * @var ?string $name The name of the rounding adjustment from the original sale order.
     */
    #[JsonProperty('name')]
    private ?string $name;

    /**
     * @var ?Money $amountMoney The actual rounding adjustment amount.
     */
    #[JsonProperty('amount_money')]
    private ?Money $amountMoney;

    /**
     * @param array{
     *   uid?: ?string,
     *   name?: ?string,
     *   amountMoney?: ?Money,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->uid = $values['uid'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->amountMoney = $values['amountMoney'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getUid(): ?string
    {
        return $this->uid;
    }

    /**
     * @param ?string $value
     */
    public function setUid(?string $value = null): self
    {
        $this->uid = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param ?string $value
     */
    public function setName(?string $value = null): self
    {
        $this->name = $value;
        return $this;
    }

    /**
     * @return ?Money
     */
    public function getAmountMoney(): ?Money
    {
        return $this->amountMoney;
    }

    /**
     * @param ?Money $value
     */
    public function setAmountMoney(?Money $value = null): self
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
