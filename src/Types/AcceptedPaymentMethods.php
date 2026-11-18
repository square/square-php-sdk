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
     * Whether ACH bank transfer payments are accepted at checkout.
     * When enabled, buyers can pay directly from their bank account via Plaid.
     * This payment method is supported only for seller locations in the United States.
     * When omitted from CreatePaymentLink, ACH is enabled for eligible one-time USD
     * payments unless the seller has disabled ACH in their merchant settings.
     * Set this field to false to disable ACH for the link. Existing links retain
     * their saved setting when this field is omitted from an update.
     *
     * @var ?bool $bankAccount
     */
    #[JsonProperty('bank_account')]
    private ?bool $bankAccount;

    /**
     * @param array{
     *   applePay?: ?bool,
     *   googlePay?: ?bool,
     *   cashAppPay?: ?bool,
     *   afterpayClearpay?: ?bool,
     *   bankAccount?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->applePay = $values['applePay'] ?? null;
        $this->googlePay = $values['googlePay'] ?? null;
        $this->cashAppPay = $values['cashAppPay'] ?? null;
        $this->afterpayClearpay = $values['afterpayClearpay'] ?? null;
        $this->bankAccount = $values['bankAccount'] ?? null;
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
        $this->_setField('applePay');
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
        $this->_setField('googlePay');
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
        $this->_setField('cashAppPay');
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
        $this->_setField('afterpayClearpay');
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getBankAccount(): ?bool
    {
        return $this->bankAccount;
    }

    /**
     * @param ?bool $value
     */
    public function setBankAccount(?bool $value = null): self
    {
        $this->bankAccount = $value;
        $this->_setField('bankAccount');
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
