<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * The settings allowed for AfterpayClearpay.
 */
class CheckoutMerchantSettingsPaymentMethodsAfterpayClearpay extends JsonSerializableType
{
    /**
     * @var ?CheckoutMerchantSettingsPaymentMethodsAfterpayClearpayEligibilityRange $orderEligibilityRange Afterpay is shown as an option for order totals falling within the configured range.
     */
    #[JsonProperty('order_eligibility_range')]
    private ?CheckoutMerchantSettingsPaymentMethodsAfterpayClearpayEligibilityRange $orderEligibilityRange;

    /**
     * @var ?CheckoutMerchantSettingsPaymentMethodsAfterpayClearpayEligibilityRange $itemEligibilityRange Afterpay is shown as an option for item totals falling within the configured range.
     */
    #[JsonProperty('item_eligibility_range')]
    private ?CheckoutMerchantSettingsPaymentMethodsAfterpayClearpayEligibilityRange $itemEligibilityRange;

    /**
     * @var ?bool $enabled Indicates whether the payment method is enabled for the account.
     */
    #[JsonProperty('enabled')]
    private ?bool $enabled;

    /**
     * @param array{
     *   orderEligibilityRange?: ?CheckoutMerchantSettingsPaymentMethodsAfterpayClearpayEligibilityRange,
     *   itemEligibilityRange?: ?CheckoutMerchantSettingsPaymentMethodsAfterpayClearpayEligibilityRange,
     *   enabled?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->orderEligibilityRange = $values['orderEligibilityRange'] ?? null;
        $this->itemEligibilityRange = $values['itemEligibilityRange'] ?? null;
        $this->enabled = $values['enabled'] ?? null;
    }

    /**
     * @return ?CheckoutMerchantSettingsPaymentMethodsAfterpayClearpayEligibilityRange
     */
    public function getOrderEligibilityRange(): ?CheckoutMerchantSettingsPaymentMethodsAfterpayClearpayEligibilityRange
    {
        return $this->orderEligibilityRange;
    }

    /**
     * @param ?CheckoutMerchantSettingsPaymentMethodsAfterpayClearpayEligibilityRange $value
     */
    public function setOrderEligibilityRange(?CheckoutMerchantSettingsPaymentMethodsAfterpayClearpayEligibilityRange $value = null): self
    {
        $this->orderEligibilityRange = $value;
        return $this;
    }

    /**
     * @return ?CheckoutMerchantSettingsPaymentMethodsAfterpayClearpayEligibilityRange
     */
    public function getItemEligibilityRange(): ?CheckoutMerchantSettingsPaymentMethodsAfterpayClearpayEligibilityRange
    {
        return $this->itemEligibilityRange;
    }

    /**
     * @param ?CheckoutMerchantSettingsPaymentMethodsAfterpayClearpayEligibilityRange $value
     */
    public function setItemEligibilityRange(?CheckoutMerchantSettingsPaymentMethodsAfterpayClearpayEligibilityRange $value = null): self
    {
        $this->itemEligibilityRange = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getEnabled(): ?bool
    {
        return $this->enabled;
    }

    /**
     * @param ?bool $value
     */
    public function setEnabled(?bool $value = null): self
    {
        $this->enabled = $value;
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
