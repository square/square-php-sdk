<?php

namespace Square\Checkout\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\CheckoutMerchantSettings;
use Square\Core\Json\JsonProperty;

class UpdateMerchantSettingsRequest extends JsonSerializableType
{
    /**
     * @var CheckoutMerchantSettings $merchantSettings Describe your updates using the `merchant_settings` object. Make sure it contains only the fields that have changed.
     */
    #[JsonProperty('merchant_settings')]
    private CheckoutMerchantSettings $merchantSettings;

    /**
     * @param array{
     *   merchantSettings: CheckoutMerchantSettings,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->merchantSettings = $values['merchantSettings'];
    }

    /**
     * @return CheckoutMerchantSettings
     */
    public function getMerchantSettings(): CheckoutMerchantSettings
    {
        return $this->merchantSettings;
    }

    /**
     * @param CheckoutMerchantSettings $value
     */
    public function setMerchantSettings(CheckoutMerchantSettings $value): self
    {
        $this->merchantSettings = $value;
        return $this;
    }
}
