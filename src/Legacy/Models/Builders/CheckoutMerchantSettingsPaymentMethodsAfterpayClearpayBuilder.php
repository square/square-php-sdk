<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\CheckoutMerchantSettingsPaymentMethodsAfterpayClearpay;
use Square\Legacy\Models\CheckoutMerchantSettingsPaymentMethodsAfterpayClearpayEligibilityRange;

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
     * Initializes a new Checkout Merchant Settings Payment Methods Afterpay Clearpay Builder object.
     */
    public static function init(): self
    {
        return new self(new CheckoutMerchantSettingsPaymentMethodsAfterpayClearpay());
    }

    /**
     * Sets order eligibility range field.
     *
     * @param CheckoutMerchantSettingsPaymentMethodsAfterpayClearpayEligibilityRange|null $value
     */
    public function orderEligibilityRange(
        ?CheckoutMerchantSettingsPaymentMethodsAfterpayClearpayEligibilityRange $value
    ): self {
        $this->instance->setOrderEligibilityRange($value);
        return $this;
    }

    /**
     * Sets item eligibility range field.
     *
     * @param CheckoutMerchantSettingsPaymentMethodsAfterpayClearpayEligibilityRange|null $value
     */
    public function itemEligibilityRange(
        ?CheckoutMerchantSettingsPaymentMethodsAfterpayClearpayEligibilityRange $value
    ): self {
        $this->instance->setItemEligibilityRange($value);
        return $this;
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
     * Initializes a new Checkout Merchant Settings Payment Methods Afterpay Clearpay object.
     */
    public function build(): CheckoutMerchantSettingsPaymentMethodsAfterpayClearpay
    {
        return CoreHelper::clone($this->instance);
    }
}
