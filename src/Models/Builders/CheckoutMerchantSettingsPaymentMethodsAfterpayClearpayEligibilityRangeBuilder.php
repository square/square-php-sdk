<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\CheckoutMerchantSettingsPaymentMethodsAfterpayClearpayEligibilityRange;
use Square\Models\Money;

/**
 * Builder for model CheckoutMerchantSettingsPaymentMethodsAfterpayClearpayEligibilityRange
 *
 * @see CheckoutMerchantSettingsPaymentMethodsAfterpayClearpayEligibilityRange
 */
class CheckoutMerchantSettingsPaymentMethodsAfterpayClearpayEligibilityRangeBuilder
{
    /**
     * @var CheckoutMerchantSettingsPaymentMethodsAfterpayClearpayEligibilityRange
     */
    private $instance;

    private function __construct(CheckoutMerchantSettingsPaymentMethodsAfterpayClearpayEligibilityRange $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new checkout merchant settings payment methods afterpay clearpay eligibility range
     * Builder object.
     */
    public static function init(Money $min, Money $max): self
    {
        return new self(new CheckoutMerchantSettingsPaymentMethodsAfterpayClearpayEligibilityRange($min, $max));
    }

    /**
     * Initializes a new checkout merchant settings payment methods afterpay clearpay eligibility range
     * object.
     */
    public function build(): CheckoutMerchantSettingsPaymentMethodsAfterpayClearpayEligibilityRange
    {
        return CoreHelper::clone($this->instance);
    }
}
