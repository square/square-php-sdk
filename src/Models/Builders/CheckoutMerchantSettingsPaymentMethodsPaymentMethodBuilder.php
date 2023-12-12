<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\CheckoutMerchantSettingsPaymentMethodsPaymentMethod;

/**
 * Builder for model CheckoutMerchantSettingsPaymentMethodsPaymentMethod
 *
 * @see CheckoutMerchantSettingsPaymentMethodsPaymentMethod
 */
class CheckoutMerchantSettingsPaymentMethodsPaymentMethodBuilder
{
    /**
     * @var CheckoutMerchantSettingsPaymentMethodsPaymentMethod
     */
    private $instance;

    private function __construct(CheckoutMerchantSettingsPaymentMethodsPaymentMethod $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new checkout merchant settings payment methods payment method Builder object.
     */
    public static function init(): self
    {
        return new self(new CheckoutMerchantSettingsPaymentMethodsPaymentMethod());
    }

    /**
     * Sets enabled field.
     */
    public function enabled(?bool $value): self
    {
        $this->instance->setEnabled($value);
        return $this;
    }

    /**
     * Unsets enabled field.
     */
    public function unsetEnabled(): self
    {
        $this->instance->unsetEnabled();
        return $this;
    }

    /**
     * Initializes a new checkout merchant settings payment methods payment method object.
     */
    public function build(): CheckoutMerchantSettingsPaymentMethodsPaymentMethod
    {
        return CoreHelper::clone($this->instance);
    }
}
