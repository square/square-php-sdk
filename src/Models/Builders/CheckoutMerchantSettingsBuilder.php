<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\CheckoutMerchantSettings;
use Square\Models\CheckoutMerchantSettingsPaymentMethods;

/**
 * Builder for model CheckoutMerchantSettings
 *
 * @see CheckoutMerchantSettings
 */
class CheckoutMerchantSettingsBuilder
{
    /**
     * @var CheckoutMerchantSettings
     */
    private $instance;

    private function __construct(CheckoutMerchantSettings $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new checkout merchant settings Builder object.
     */
    public static function init(): self
    {
        return new self(new CheckoutMerchantSettings());
    }

    /**
     * Sets payment methods field.
     */
    public function paymentMethods(?CheckoutMerchantSettingsPaymentMethods $value): self
    {
        $this->instance->setPaymentMethods($value);
        return $this;
    }

    /**
     * Sets updated at field.
     */
    public function updatedAt(?string $value): self
    {
        $this->instance->setUpdatedAt($value);
        return $this;
    }

    /**
     * Initializes a new checkout merchant settings object.
     */
    public function build(): CheckoutMerchantSettings
    {
        return CoreHelper::clone($this->instance);
    }
}
