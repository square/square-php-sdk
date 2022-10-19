<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

/**
 * The payment methods that customers can use to pay an [invoice]($m/Invoice) on the Square-hosted
 * invoice payment page.
 */
class InvoiceAcceptedPaymentMethods implements \JsonSerializable
{
    /**
     * @var bool|null
     */
    private $card;

    /**
     * @var bool|null
     */
    private $squareGiftCard;

    /**
     * @var bool|null
     */
    private $bankAccount;

    /**
     * @var bool|null
     */
    private $buyNowPayLater;

    /**
     * Returns Card.
     * Indicates whether credit card or debit card payments are accepted. The default value is `false`.
     */
    public function getCard(): ?bool
    {
        return $this->card;
    }

    /**
     * Sets Card.
     * Indicates whether credit card or debit card payments are accepted. The default value is `false`.
     *
     * @maps card
     */
    public function setCard(?bool $card): void
    {
        $this->card = $card;
    }

    /**
     * Returns Square Gift Card.
     * Indicates whether Square gift card payments are accepted. The default value is `false`.
     */
    public function getSquareGiftCard(): ?bool
    {
        return $this->squareGiftCard;
    }

    /**
     * Sets Square Gift Card.
     * Indicates whether Square gift card payments are accepted. The default value is `false`.
     *
     * @maps square_gift_card
     */
    public function setSquareGiftCard(?bool $squareGiftCard): void
    {
        $this->squareGiftCard = $squareGiftCard;
    }

    /**
     * Returns Bank Account.
     * Indicates whether bank transfer payments are accepted. The default value is `false`.
     *
     * This option is allowed only for invoices that have a single payment request of the `BALANCE` type.
     */
    public function getBankAccount(): ?bool
    {
        return $this->bankAccount;
    }

    /**
     * Sets Bank Account.
     * Indicates whether bank transfer payments are accepted. The default value is `false`.
     *
     * This option is allowed only for invoices that have a single payment request of the `BALANCE` type.
     *
     * @maps bank_account
     */
    public function setBankAccount(?bool $bankAccount): void
    {
        $this->bankAccount = $bankAccount;
    }

    /**
     * Returns Buy Now Pay Later.
     * Indicates whether Afterpay (also known as Clearpay) payments are accepted. The default value is
     * `false`.
     *
     * This option is allowed only for invoices that have a single payment request of the `BALANCE` type.
     * This payment method is
     * supported if the seller account accepts Afterpay payments and the seller location is in a country
     * where Afterpay
     * invoice payments are supported. As a best practice, consider enabling an additional payment method
     * when allowing
     * `buy_now_pay_later` payments. For more information, including detailed requirements and processing
     * limits, see
     * [Buy Now Pay Later payments with Afterpay](https://developer.squareup.com/docs/invoices-
     * api/overview#buy-now-pay-later).
     */
    public function getBuyNowPayLater(): ?bool
    {
        return $this->buyNowPayLater;
    }

    /**
     * Sets Buy Now Pay Later.
     * Indicates whether Afterpay (also known as Clearpay) payments are accepted. The default value is
     * `false`.
     *
     * This option is allowed only for invoices that have a single payment request of the `BALANCE` type.
     * This payment method is
     * supported if the seller account accepts Afterpay payments and the seller location is in a country
     * where Afterpay
     * invoice payments are supported. As a best practice, consider enabling an additional payment method
     * when allowing
     * `buy_now_pay_later` payments. For more information, including detailed requirements and processing
     * limits, see
     * [Buy Now Pay Later payments with Afterpay](https://developer.squareup.com/docs/invoices-
     * api/overview#buy-now-pay-later).
     *
     * @maps buy_now_pay_later
     */
    public function setBuyNowPayLater(?bool $buyNowPayLater): void
    {
        $this->buyNowPayLater = $buyNowPayLater;
    }

    /**
     * Encode this object to JSON
     *
     * @param bool $asArrayWhenEmpty Whether to serialize this model as an array whenever no fields
     *        are set. (default: false)
     *
     * @return array|stdClass
     */
    #[\ReturnTypeWillChange] // @phan-suppress-current-line PhanUndeclaredClassAttribute for (php < 8.1)
    public function jsonSerialize(bool $asArrayWhenEmpty = false)
    {
        $json = [];
        if (isset($this->card)) {
            $json['card']              = $this->card;
        }
        if (isset($this->squareGiftCard)) {
            $json['square_gift_card']  = $this->squareGiftCard;
        }
        if (isset($this->bankAccount)) {
            $json['bank_account']      = $this->bankAccount;
        }
        if (isset($this->buyNowPayLater)) {
            $json['buy_now_pay_later'] = $this->buyNowPayLater;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
