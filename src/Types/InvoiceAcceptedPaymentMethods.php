<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * The payment methods that customers can use to pay an [invoice](entity:Invoice) on the Square-hosted invoice payment page.
 */
class InvoiceAcceptedPaymentMethods extends JsonSerializableType
{
    /**
     * @var ?bool $card Indicates whether credit card or debit card payments are accepted. The default value is `false`.
     */
    #[JsonProperty('card')]
    private ?bool $card;

    /**
     * @var ?bool $squareGiftCard Indicates whether Square gift card payments are accepted. The default value is `false`.
     */
    #[JsonProperty('square_gift_card')]
    private ?bool $squareGiftCard;

    /**
     * @var ?bool $bankAccount Indicates whether ACH bank transfer payments are accepted. The default value is `false`.
     */
    #[JsonProperty('bank_account')]
    private ?bool $bankAccount;

    /**
     * Indicates whether Afterpay (also known as Clearpay) payments are accepted. The default value is `false`.
     *
     * This option is allowed only for invoices that have a single payment request of the `BALANCE` type. This payment method is
     * supported if the seller account accepts Afterpay payments and the seller location is in a country where Afterpay
     * invoice payments are supported. As a best practice, consider enabling an additional payment method when allowing
     * `buy_now_pay_later` payments. For more information, including detailed requirements and processing limits, see
     * [Buy Now Pay Later payments with Afterpay](https://developer.squareup.com/docs/invoices-api/overview#buy-now-pay-later).
     *
     * @var ?bool $buyNowPayLater
     */
    #[JsonProperty('buy_now_pay_later')]
    private ?bool $buyNowPayLater;

    /**
     * Indicates whether Cash App payments are accepted. The default value is `false`.
     *
     * This payment method is supported only for seller [locations](entity:Location) in the United States.
     *
     * @var ?bool $cashAppPay
     */
    #[JsonProperty('cash_app_pay')]
    private ?bool $cashAppPay;

    /**
     * @param array{
     *   card?: ?bool,
     *   squareGiftCard?: ?bool,
     *   bankAccount?: ?bool,
     *   buyNowPayLater?: ?bool,
     *   cashAppPay?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->card = $values['card'] ?? null;
        $this->squareGiftCard = $values['squareGiftCard'] ?? null;
        $this->bankAccount = $values['bankAccount'] ?? null;
        $this->buyNowPayLater = $values['buyNowPayLater'] ?? null;
        $this->cashAppPay = $values['cashAppPay'] ?? null;
    }

    /**
     * @return ?bool
     */
    public function getCard(): ?bool
    {
        return $this->card;
    }

    /**
     * @param ?bool $value
     */
    public function setCard(?bool $value = null): self
    {
        $this->card = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getSquareGiftCard(): ?bool
    {
        return $this->squareGiftCard;
    }

    /**
     * @param ?bool $value
     */
    public function setSquareGiftCard(?bool $value = null): self
    {
        $this->squareGiftCard = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getBankAccount(): ?bool
    {
        return $this->bankAccount;
    }

    /**
     * @param ?bool $value
     */
    public function setBankAccount(?bool $value = null): self
    {
        $this->bankAccount = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getBuyNowPayLater(): ?bool
    {
        return $this->buyNowPayLater;
    }

    /**
     * @param ?bool $value
     */
    public function setBuyNowPayLater(?bool $value = null): self
    {
        $this->buyNowPayLater = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getCashAppPay(): ?bool
    {
        return $this->cashAppPay;
    }

    /**
     * @param ?bool $value
     */
    public function setCashAppPay(?bool $value = null): self
    {
        $this->cashAppPay = $value;
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
