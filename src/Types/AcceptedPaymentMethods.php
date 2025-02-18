<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class AcceptedPaymentMethods extends JsonSerializableType
{
    /**
     * @var ?bool $applePay Whether Apple Pay is accepted at checkout.
     */
    #[JsonProperty('apple_pay')]
    private ?bool $applePay;

    /**
     * @var ?bool $googlePay Whether Google Pay is accepted at checkout.
     */
    #[JsonProperty('google_pay')]
    private ?bool $googlePay;

    /**
     * @var ?bool $cashAppPay Whether Cash App Pay is accepted at checkout.
     */
    #[JsonProperty('cash_app_pay')]
    private ?bool $cashAppPay;

    /**
     * @var ?bool $afterpayClearpay Whether Afterpay/Clearpay is accepted at checkout.
     */
    #[JsonProperty('afterpay_clearpay')]
    private ?bool $afterpayClearpay;

    /**
     * @param array{
     *   applePay?: ?bool,
     *   googlePay?: ?bool,
     *   cashAppPay?: ?bool,
     *   afterpayClearpay?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->applePay = $values['applePay'] ?? null;
        $this->googlePay = $values['googlePay'] ?? null;
        $this->cashAppPay = $values['cashAppPay'] ?? null;
        $this->afterpayClearpay = $values['afterpayClearpay'] ?? null;
    }

    /**
     * @return ?bool
     */
    public function getApplePay(): ?bool
    {
        return $this->applePay;
    }

    /**
     * @param ?bool $value
     */
    public function setApplePay(?bool $value = null): self
    {
        $this->applePay = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getGooglePay(): ?bool
    {
        return $this->googlePay;
    }

    /**
     * @param ?bool $value
     */
    public function setGooglePay(?bool $value = null): self
    {
        $this->googlePay = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getCashAppPay(): ?bool
    {
        return $this->cashAppPay;
    }

    /**
     * @param ?bool $value
     */
    public function setCashAppPay(?bool $value = null): self
    {
        $this->cashAppPay = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getAfterpayClearpay(): ?bool
    {
        return $this->afterpayClearpay;
    }

    /**
     * @param ?bool $value
     */
    public function setAfterpayClearpay(?bool $value = null): self
    {
        $this->afterpayClearpay = $value;
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
