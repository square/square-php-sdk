<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class CheckoutMerchantSettingsPaymentMethods extends JsonSerializableType
{
    /**
     * @var ?CheckoutMerchantSettingsPaymentMethodsPaymentMethod $applePay
     */
    #[JsonProperty('apple_pay')]
    private ?CheckoutMerchantSettingsPaymentMethodsPaymentMethod $applePay;

    /**
     * @var ?CheckoutMerchantSettingsPaymentMethodsPaymentMethod $googlePay
     */
    #[JsonProperty('google_pay')]
    private ?CheckoutMerchantSettingsPaymentMethodsPaymentMethod $googlePay;

    /**
     * @var ?CheckoutMerchantSettingsPaymentMethodsPaymentMethod $cashApp
     */
    #[JsonProperty('cash_app')]
    private ?CheckoutMerchantSettingsPaymentMethodsPaymentMethod $cashApp;

    /**
     * @var ?CheckoutMerchantSettingsPaymentMethodsAfterpayClearpay $afterpayClearpay
     */
    #[JsonProperty('afterpay_clearpay')]
    private ?CheckoutMerchantSettingsPaymentMethodsAfterpayClearpay $afterpayClearpay;

    /**
     * @param array{
     *   applePay?: ?CheckoutMerchantSettingsPaymentMethodsPaymentMethod,
     *   googlePay?: ?CheckoutMerchantSettingsPaymentMethodsPaymentMethod,
     *   cashApp?: ?CheckoutMerchantSettingsPaymentMethodsPaymentMethod,
     *   afterpayClearpay?: ?CheckoutMerchantSettingsPaymentMethodsAfterpayClearpay,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->applePay = $values['applePay'] ?? null;
        $this->googlePay = $values['googlePay'] ?? null;
        $this->cashApp = $values['cashApp'] ?? null;
        $this->afterpayClearpay = $values['afterpayClearpay'] ?? null;
    }

    /**
     * @return ?CheckoutMerchantSettingsPaymentMethodsPaymentMethod
     */
    public function getApplePay(): ?CheckoutMerchantSettingsPaymentMethodsPaymentMethod
    {
        return $this->applePay;
    }

    /**
     * @param ?CheckoutMerchantSettingsPaymentMethodsPaymentMethod $value
     */
    public function setApplePay(?CheckoutMerchantSettingsPaymentMethodsPaymentMethod $value = null): self
    {
        $this->applePay = $value;
        $this->_setField('applePay');
        return $this;
    }

    /**
     * @return ?CheckoutMerchantSettingsPaymentMethodsPaymentMethod
     */
    public function getGooglePay(): ?CheckoutMerchantSettingsPaymentMethodsPaymentMethod
    {
        return $this->googlePay;
    }

    /**
     * @param ?CheckoutMerchantSettingsPaymentMethodsPaymentMethod $value
     */
    public function setGooglePay(?CheckoutMerchantSettingsPaymentMethodsPaymentMethod $value = null): self
    {
        $this->googlePay = $value;
        $this->_setField('googlePay');
        return $this;
    }

    /**
     * @return ?CheckoutMerchantSettingsPaymentMethodsPaymentMethod
     */
    public function getCashApp(): ?CheckoutMerchantSettingsPaymentMethodsPaymentMethod
    {
        return $this->cashApp;
    }

    /**
     * @param ?CheckoutMerchantSettingsPaymentMethodsPaymentMethod $value
     */
    public function setCashApp(?CheckoutMerchantSettingsPaymentMethodsPaymentMethod $value = null): self
    {
        $this->cashApp = $value;
        $this->_setField('cashApp');
        return $this;
    }

    /**
     * @return ?CheckoutMerchantSettingsPaymentMethodsAfterpayClearpay
     */
    public function getAfterpayClearpay(): ?CheckoutMerchantSettingsPaymentMethodsAfterpayClearpay
    {
        return $this->afterpayClearpay;
    }

    /**
     * @param ?CheckoutMerchantSettingsPaymentMethodsAfterpayClearpay $value
     */
    public function setAfterpayClearpay(?CheckoutMerchantSettingsPaymentMethodsAfterpayClearpay $value = null): self
    {
        $this->afterpayClearpay = $value;
        $this->_setField('afterpayClearpay');
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
