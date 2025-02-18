<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class CheckoutMerchantSettings extends JsonSerializableType
{
    /**
     * @var ?CheckoutMerchantSettingsPaymentMethods $paymentMethods The set of payment methods accepted for the merchant's account.
     */
    #[JsonProperty('payment_methods')]
    private ?CheckoutMerchantSettingsPaymentMethods $paymentMethods;

    /**
     * The timestamp when the settings were last updated, in RFC 3339 format.
     * Examples for January 25th, 2020 6:25:34pm Pacific Standard Time:
     * UTC: 2020-01-26T02:25:34Z
     * Pacific Standard Time with UTC offset: 2020-01-25T18:25:34-08:00
     *
     * @var ?string $updatedAt
     */
    #[JsonProperty('updated_at')]
    private ?string $updatedAt;

    /**
     * @param array{
     *   paymentMethods?: ?CheckoutMerchantSettingsPaymentMethods,
     *   updatedAt?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->paymentMethods = $values['paymentMethods'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
    }

    /**
     * @return ?CheckoutMerchantSettingsPaymentMethods
     */
    public function getPaymentMethods(): ?CheckoutMerchantSettingsPaymentMethods
    {
        return $this->paymentMethods;
    }

    /**
     * @param ?CheckoutMerchantSettingsPaymentMethods $value
     */
    public function setPaymentMethods(?CheckoutMerchantSettingsPaymentMethods $value = null): self
    {
        $this->paymentMethods = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

    /**
     * @param ?string $value
     */
    public function setUpdatedAt(?string $value = null): self
    {
        $this->updatedAt = $value;
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
