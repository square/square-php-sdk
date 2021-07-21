<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * The payment methods that customers can use to pay an invoice on the Square-hosted invoice page.
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
     * Returns Card.
     *
     * Indicates whether credit card or debit card payments are accepted. The default value is `false`.
     */
    public function getCard(): ?bool
    {
        return $this->card;
    }

    /**
     * Sets Card.
     *
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
     *
     * Indicates whether Square gift card payments are accepted. The default value is `false`.
     */
    public function getSquareGiftCard(): ?bool
    {
        return $this->squareGiftCard;
    }

    /**
     * Sets Square Gift Card.
     *
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
     *
     * Indicates whether bank transfer payments are accepted. The default value is `false`.
     *
     * This option is allowed only for invoices that have a single payment request of type `BALANCE`.
     */
    public function getBankAccount(): ?bool
    {
        return $this->bankAccount;
    }

    /**
     * Sets Bank Account.
     *
     * Indicates whether bank transfer payments are accepted. The default value is `false`.
     *
     * This option is allowed only for invoices that have a single payment request of type `BALANCE`.
     *
     * @maps bank_account
     */
    public function setBankAccount(?bool $bankAccount): void
    {
        $this->bankAccount = $bankAccount;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->card)) {
            $json['card']             = $this->card;
        }
        if (isset($this->squareGiftCard)) {
            $json['square_gift_card'] = $this->squareGiftCard;
        }
        if (isset($this->bankAccount)) {
            $json['bank_account']     = $this->bankAccount;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
