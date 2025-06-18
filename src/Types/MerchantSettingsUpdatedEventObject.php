<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class MerchantSettingsUpdatedEventObject extends JsonSerializableType
{
    /**
     * @var ?CheckoutMerchantSettings $merchantSettings The updated merchant settings.
     */
    #[JsonProperty('merchant_settings')]
    private ?CheckoutMerchantSettings $merchantSettings;

    /**
     * @param array{
     *   merchantSettings?: ?CheckoutMerchantSettings,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->merchantSettings = $values['merchantSettings'] ?? null;
    }

    /**
     * @return ?CheckoutMerchantSettings
     */
    public function getMerchantSettings(): ?CheckoutMerchantSettings
    {
        return $this->merchantSettings;
    }

    /**
     * @param ?CheckoutMerchantSettings $value
     */
    public function setMerchantSettings(?CheckoutMerchantSettings $value = null): self
    {
        $this->merchantSettings = $value;
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
