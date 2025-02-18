<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class UpdateMerchantSettingsResponse extends JsonSerializableType
{
    /**
     * @var ?array<Error> $errors Any errors that occurred when updating the merchant settings.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @var ?CheckoutMerchantSettings $merchantSettings The updated merchant settings.
     */
    #[JsonProperty('merchant_settings')]
    private ?CheckoutMerchantSettings $merchantSettings;

    /**
     * @param array{
     *   errors?: ?array<Error>,
     *   merchantSettings?: ?CheckoutMerchantSettings,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->errors = $values['errors'] ?? null;
        $this->merchantSettings = $values['merchantSettings'] ?? null;
    }

    /**
     * @return ?array<Error>
     */
    public function getErrors(): ?array
    {
        return $this->errors;
    }

    /**
     * @param ?array<Error> $value
     */
    public function setErrors(?array $value = null): self
    {
        $this->errors = $value;
        return $this;
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
