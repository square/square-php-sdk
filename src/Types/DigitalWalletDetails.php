<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Additional details about `WALLET` type payments. Contains only non-confidential information.
 */
class DigitalWalletDetails extends JsonSerializableType
{
    /**
     * The status of the `WALLET` payment. The status can be `AUTHORIZED`, `CAPTURED`, `VOIDED`, or
     * `FAILED`.
     *
     * @var ?string $status
     */
    #[JsonProperty('status')]
    private ?string $status;

    /**
     * The brand used for the `WALLET` payment. The brand can be `CASH_APP`, `PAYPAY`, `ALIPAY`,
     * `RAKUTEN_PAY`, `AU_PAY`, `D_BARAI`, `MERPAY`, `WECHAT_PAY` or `UNKNOWN`.
     *
     * @var ?string $brand
     */
    #[JsonProperty('brand')]
    private ?string $brand;

    /**
     * @var ?CashAppDetails $cashAppDetails Brand-specific details for payments with the `brand` of `CASH_APP`.
     */
    #[JsonProperty('cash_app_details')]
    private ?CashAppDetails $cashAppDetails;

    /**
     * @param array{
     *   status?: ?string,
     *   brand?: ?string,
     *   cashAppDetails?: ?CashAppDetails,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->status = $values['status'] ?? null;
        $this->brand = $values['brand'] ?? null;
        $this->cashAppDetails = $values['cashAppDetails'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param ?string $value
     */
    public function setStatus(?string $value = null): self
    {
        $this->status = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getBrand(): ?string
    {
        return $this->brand;
    }

    /**
     * @param ?string $value
     */
    public function setBrand(?string $value = null): self
    {
        $this->brand = $value;
        return $this;
    }

    /**
     * @return ?CashAppDetails
     */
    public function getCashAppDetails(): ?CashAppDetails
    {
        return $this->cashAppDetails;
    }

    /**
     * @param ?CashAppDetails $value
     */
    public function setCashAppDetails(?CashAppDetails $value = null): self
    {
        $this->cashAppDetails = $value;
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
