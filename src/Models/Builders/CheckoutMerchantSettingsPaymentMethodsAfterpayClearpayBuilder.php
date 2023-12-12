<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\CheckoutMerchantSettingsPaymentMethodsAfterpayClearpay;
use Square\Models\CheckoutMerchantSettingsPaymentMethodsAfterpayClearpayEligibilityRange;

/**
 * Builder for model CheckoutMerchantSettingsPaymentMethodsAfterpayClearpay
 *
 * @see CheckoutMerchantSettingsPaymentMethodsAfterpayClearpay
 */
class CheckoutMerchantSettingsPaymentMethodsAfterpayClearpayBuilder
{
    /**
     * @var CheckoutMerchantSettingsPaymentMethodsAfterpayClearpay
     */
    private $instance;

    private function __construct(CheckoutMerchantSettingsPaymentMethodsAfterpayClearpay $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new checkout merchant settings payment methods afterpay clearpay Builder object.
     */
    public static function init(): self
    {
        return new self(new CheckoutMerchantSettingsPaymentMethodsAfterpayClearpay());
    }

    /**
     * Sets order eligibility range field.
     */
    public function orderEligibilityRange(
        ?CheckoutMerchantSettingsPaymentMethodsAfterpayClearpayEligibilityRange $value
    ): self {
        $this->instance->setOrderEligibilityRange($value);
        return $this;
    }

    /**
     * Sets item eligibility range field.
     */
    public function itemEligibilityRange(
        ?CheckoutMerchantSettingsPaymentMethodsAfterpayClearpayEligibilityRange $value
    ): self {
        $this->instance->setItemEligibilityRange($value);
        return $this;
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
     * Initializes a new checkout merchant settings payment methods afterpay clearpay object.
     */
    public function build(): CheckoutMerchantSettingsPaymentMethodsAfterpayClearpay
    {
        return CoreHelper::clone($this->instance);
    }
}
