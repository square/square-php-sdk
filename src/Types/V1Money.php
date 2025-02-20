<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class V1Money extends JsonSerializableType
{
    /**
     * Amount in the lowest denominated value of this Currency. E.g. in USD
     * these are cents, in JPY they are Yen (which do not have a 'cent' concept).
     *
     * @var ?int $amount
     */
    #[JsonProperty('amount')]
    private ?int $amount;

    /**
     *
     * See [Currency](#type-currency) for possible values
     *
     * @var ?value-of<Currency> $currencyCode
     */
    #[JsonProperty('currency_code')]
    private ?string $currencyCode;

    /**
     * @param array{
     *   amount?: ?int,
     *   currencyCode?: ?value-of<Currency>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->amount = $values['amount'] ?? null;
        $this->currencyCode = $values['currencyCode'] ?? null;
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
    public function getCurrencyCode(): ?string
    {
        return $this->currencyCode;
    }

    /**
     * @param ?value-of<Currency> $value
     */
    public function setCurrencyCode(?string $value = null): self
    {
        $this->currencyCode = $value;
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
