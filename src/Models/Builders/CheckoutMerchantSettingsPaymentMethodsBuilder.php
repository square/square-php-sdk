<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\CheckoutMerchantSettingsPaymentMethods;
use Square\Models\CheckoutMerchantSettingsPaymentMethodsAfterpayClearpay;
use Square\Models\CheckoutMerchantSettingsPaymentMethodsPaymentMethod;

/**
 * Builder for model CheckoutMerchantSettingsPaymentMethods
 *
 * @see CheckoutMerchantSettingsPaymentMethods
 */
class CheckoutMerchantSettingsPaymentMethodsBuilder
{
    /**
     * @var CheckoutMerchantSettingsPaymentMethods
     */
    private $instance;

    private function __construct(CheckoutMerchantSettingsPaymentMethods $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new checkout merchant settings payment methods Builder object.
     */
    public static function init(): self
    {
        return new self(new CheckoutMerchantSettingsPaymentMethods());
    }

    /**
     * Sets apple pay field.
     */
    public function applePay(?CheckoutMerchantSettingsPaymentMethodsPaymentMethod $value): self
    {
        $this->instance->setApplePay($value);
        return $this;
    }

    /**
     * Sets google pay field.
     */
    public function googlePay(?CheckoutMerchantSettingsPaymentMethodsPaymentMethod $value): self
    {
        $this->instance->setGooglePay($value);
        return $this;
    }

    /**
     * Sets cash app field.
     */
    public function cashApp(?CheckoutMerchantSettingsPaymentMethodsPaymentMethod $value): self
    {
        $this->instance->setCashApp($value);
        return $this;
    }

    /**
     * Sets afterpay clearpay field.
     */
    public function afterpayClearpay(?CheckoutMerchantSettingsPaymentMethodsAfterpayClearpay $value): self
    {
        $this->instance->setAfterpayClearpay($value);
        return $this;
    }

    /**
     * Initializes a new checkout merchant settings payment methods object.
     */
    public function build(): CheckoutMerchantSettingsPaymentMethods
    {
        return CoreHelper::clone($this->instance);
    }
}
