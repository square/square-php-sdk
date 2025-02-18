<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\CheckoutMerchantSettingsPaymentMethodsPaymentMethod;

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
     * Initializes a new Checkout Merchant Settings Payment Methods Payment Method Builder object.
     */
    public static function init(): self
    {
        return new self(new CheckoutMerchantSettingsPaymentMethodsPaymentMethod());
    }

    /**
     * Sets enabled field.
     *
     * @param bool|null $value
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
     * Initializes a new Checkout Merchant Settings Payment Methods Payment Method object.
     */
    public function build(): CheckoutMerchantSettingsPaymentMethodsPaymentMethod
    {
        return CoreHelper::clone($this->instance);
    }
}
