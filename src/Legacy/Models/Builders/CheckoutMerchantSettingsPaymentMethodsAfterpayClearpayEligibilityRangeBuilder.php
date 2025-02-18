<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\CheckoutMerchantSettingsPaymentMethodsAfterpayClearpayEligibilityRange;
use Square\Legacy\Models\Money;

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
     * Initializes a new Checkout Merchant Settings Payment Methods Afterpay Clearpay Eligibility Range
     * Builder object.
     *
     * @param Money $min
     * @param Money $max
     */
    public static function init(Money $min, Money $max): self
    {
        return new self(new CheckoutMerchantSettingsPaymentMethodsAfterpayClearpayEligibilityRange($min, $max));
    }

    /**
     * Initializes a new Checkout Merchant Settings Payment Methods Afterpay Clearpay Eligibility Range
     * object.
     */
    public function build(): CheckoutMerchantSettingsPaymentMethodsAfterpayClearpayEligibilityRange
    {
        return CoreHelper::clone($this->instance);
    }
}
