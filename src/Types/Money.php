<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents an amount of money. `Money` fields can be signed or unsigned.
 * Fields that do not explicitly define whether they are signed or unsigned are
 * considered unsigned and can only hold positive amounts. For signed fields, the
 * sign of the value indicates the purpose of the money transfer. See
 * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-monetary-amounts)
 * for more information.
 */
class Money extends JsonSerializableType
{
    /**
     * The amount of money, in the smallest denomination of the currency
     * indicated by `currency`. For example, when `currency` is `USD`, `amount` is
     * in cents. Monetary amounts can be positive or negative. See the specific
     * field description to determine the meaning of the sign in a particular case.
     *
     * @var ?int $amount
     */
    #[JsonProperty('amount')]
    private ?int $amount;

    /**
     * The type of currency, in __ISO 4217 format__. For example, the currency
     * code for US dollars is `USD`.
     *
     * See [Currency](entity:Currency) for possible values.
     * See [Currency](#type-currency) for possible values
     *
     * @var ?value-of<Currency> $currency
     */
    #[JsonProperty('currency')]
    private ?string $currency;

    /**
     * @param array{
     *   amount?: ?int,
     *   currency?: ?value-of<Currency>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->amount = $values['amount'] ?? null;
        $this->currency = $values['currency'] ?? null;
    }

    /**
     * @return ?int
     */
    public function getAmount(): ?int
    {
        return $this->amount;
    }

    /**
     * @param ?int $value
     */
    public function setAmount(?int $value = null): self
    {
        $this->amount = $value;
        return $this;
    }

    /**
     * @return ?value-of<Currency>
     */
    public function getCurrency(): ?string
    {
        return $this->currency;
    }

    /**
     * @param ?value-of<Currency> $value
     */
    public function setCurrency(?string $value = null): self
    {
        $this->currency = $value;
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
