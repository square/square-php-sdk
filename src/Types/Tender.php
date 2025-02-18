<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Represents a tender (i.e., a method of payment) used in a Square transaction.
 */
class Tender extends JsonSerializableType
{
    /**
     * @var ?string $id The tender's unique ID. It is the associated payment ID.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?string $locationId The ID of the transaction's associated location.
     */
    #[JsonProperty('location_id')]
    private ?string $locationId;

    /**
     * @var ?string $transactionId The ID of the tender's associated transaction.
     */
    #[JsonProperty('transaction_id')]
    private ?string $transactionId;

    /**
     * @var ?string $createdAt The timestamp for when the tender was created, in RFC 3339 format.
     */
    #[JsonProperty('created_at')]
    private ?string $createdAt;

    /**
     * @var ?string $note An optional note associated with the tender at the time of payment.
     */
    #[JsonProperty('note')]
    private ?string $note;

    /**
     * The total amount of the tender, including `tip_money`. If the tender has a `payment_id`,
     * the `total_money` of the corresponding [Payment](entity:Payment) will be equal to the
     * `amount_money` of the tender.
     *
     * @var ?Money $amountMoney
     */
    #[JsonProperty('amount_money')]
    private ?Money $amountMoney;

    /**
     * @var ?Money $tipMoney The tip's amount of the tender.
     */
    #[JsonProperty('tip_money')]
    private ?Money $tipMoney;

    /**
     * The amount of any Square processing fees applied to the tender.
     *
     * This field is not immediately populated when a new transaction is created.
     * It is usually available after about ten seconds.
     *
     * @var ?Money $processingFeeMoney
     */
    #[JsonProperty('processing_fee_money')]
    private ?Money $processingFeeMoney;

    /**
     * If the tender is associated with a customer or represents a customer's card on file,
     * this is the ID of the associated customer.
     *
     * @var ?string $customerId
     */
    #[JsonProperty('customer_id')]
    private ?string $customerId;

    /**
     * The type of tender, such as `CARD` or `CASH`.
     * See [TenderType](#type-tendertype) for possible values
     *
     * @var value-of<TenderType> $type
     */
    #[JsonProperty('type')]
    private string $type;

    /**
     * The details of the card tender.
     *
     * This value is present only if the value of `type` is `CARD`.
     *
     * @var ?TenderCardDetails $cardDetails
     */
    #[JsonProperty('card_details')]
    private ?TenderCardDetails $cardDetails;

    /**
     * The details of the cash tender.
     *
     * This value is present only if the value of `type` is `CASH`.
     *
     * @var ?TenderCashDetails $cashDetails
     */
    #[JsonProperty('cash_details')]
    private ?TenderCashDetails $cashDetails;

    /**
     * The details of the bank account tender.
     *
     * This value is present only if the value of `type` is `BANK_ACCOUNT`.
     *
     * @var ?TenderBankAccountDetails $bankAccountDetails
     */
    #[JsonProperty('bank_account_details')]
    private ?TenderBankAccountDetails $bankAccountDetails;

    /**
     * The details of a Buy Now Pay Later tender.
     *
     * This value is present only if the value of `type` is `BUY_NOW_PAY_LATER`.
     *
     * @var ?TenderBuyNowPayLaterDetails $buyNowPayLaterDetails
     */
    #[JsonProperty('buy_now_pay_later_details')]
    private ?TenderBuyNowPayLaterDetails $buyNowPayLaterDetails;

    /**
     * The details of a Square Account tender.
     *
     * This value is present only if the value of `type` is `SQUARE_ACCOUNT`.
     *
     * @var ?TenderSquareAccountDetails $squareAccountDetails
     */
    #[JsonProperty('square_account_details')]
    private ?TenderSquareAccountDetails $squareAccountDetails;

    /**
     * Additional recipients (other than the merchant) receiving a portion of this tender.
     * For example, fees assessed on the purchase by a third party integration.
     *
     * @var ?array<AdditionalRecipient> $additionalRecipients
     */
    #[JsonProperty('additional_recipients'), ArrayType([AdditionalRecipient::class])]
    private ?array $additionalRecipients;

    /**
     * The ID of the [Payment](entity:Payment) that corresponds to this tender.
     * This value is only present for payments created with the v2 Payments API.
     *
     * @var ?string $paymentId
     */
    #[JsonProperty('payment_id')]
    private ?string $paymentId;

    /**
     * @param array{
     *   type: value-of<TenderType>,
     *   id?: ?string,
     *   locationId?: ?string,
     *   transactionId?: ?string,
     *   createdAt?: ?string,
     *   note?: ?string,
     *   amountMoney?: ?Money,
     *   tipMoney?: ?Money,
     *   processingFeeMoney?: ?Money,
     *   customerId?: ?string,
     *   cardDetails?: ?TenderCardDetails,
     *   cashDetails?: ?TenderCashDetails,
     *   bankAccountDetails?: ?TenderBankAccountDetails,
     *   buyNowPayLaterDetails?: ?TenderBuyNowPayLaterDetails,
     *   squareAccountDetails?: ?TenderSquareAccountDetails,
     *   additionalRecipients?: ?array<AdditionalRecipient>,
     *   paymentId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'] ?? null;
        $this->locationId = $values['locationId'] ?? null;
        $this->transactionId = $values['transactionId'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->note = $values['note'] ?? null;
        $this->amountMoney = $values['amountMoney'] ?? null;
        $this->tipMoney = $values['tipMoney'] ?? null;
        $this->processingFeeMoney = $values['processingFeeMoney'] ?? null;
        $this->customerId = $values['customerId'] ?? null;
        $this->type = $values['type'];
        $this->cardDetails = $values['cardDetails'] ?? null;
        $this->cashDetails = $values['cashDetails'] ?? null;
        $this->bankAccountDetails = $values['bankAccountDetails'] ?? null;
        $this->buyNowPayLaterDetails = $values['buyNowPayLaterDetails'] ?? null;
        $this->squareAccountDetails = $values['squareAccountDetails'] ?? null;
        $this->additionalRecipients = $values['additionalRecipients'] ?? null;
        $this->paymentId = $values['paymentId'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param ?string $value
     */
    public function setId(?string $value = null): self
    {
        $this->id = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getLocationId(): ?string
    {
        return $this->locationId;
    }

    /**
     * @param ?string $value
     */
    public function setLocationId(?string $value = null): self
    {
        $this->locationId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getTransactionId(): ?string
    {
        return $this->transactionId;
    }

    /**
     * @param ?string $value
     */
    public function setTransactionId(?string $value = null): self
    {
        $this->transactionId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    /**
     * @param ?string $value
     */
    public function setCreatedAt(?string $value = null): self
    {
        $this->createdAt = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getNote(): ?string
    {
        return $this->note;
    }

    /**
     * @param ?string $value
     */
    public function setNote(?string $value = null): self
    {
        $this->note = $value;
        return $this;
    }

    /**
     * @return ?Money
     */
    public function getAmountMoney(): ?Money
    {
        return $this->amountMoney;
    }

    /**
     * @param ?Money $value
     */
    public function setAmountMoney(?Money $value = null): self
    {
        $this->amountMoney = $value;
        return $this;
    }

    /**
     * @return ?Money
     */
    public function getTipMoney(): ?Money
    {
        return $this->tipMoney;
    }

    /**
     * @param ?Money $value
     */
    public function setTipMoney(?Money $value = null): self
    {
        $this->tipMoney = $value;
        return $this;
    }

    /**
     * @return ?Money
     */
    public function getProcessingFeeMoney(): ?Money
    {
        return $this->processingFeeMoney;
    }

    /**
     * @param ?Money $value
     */
    public function setProcessingFeeMoney(?Money $value = null): self
    {
        $this->processingFeeMoney = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCustomerId(): ?string
    {
        return $this->customerId;
    }

    /**
     * @param ?string $value
     */
    public function setCustomerId(?string $value = null): self
    {
        $this->customerId = $value;
        return $this;
    }

    /**
     * @return value-of<TenderType>
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param value-of<TenderType> $value
     */
    public function setType(string $value): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return ?TenderCardDetails
     */
    public function getCardDetails(): ?TenderCardDetails
    {
        return $this->cardDetails;
    }

    /**
     * @param ?TenderCardDetails $value
     */
    public function setCardDetails(?TenderCardDetails $value = null): self
    {
        $this->cardDetails = $value;
        return $this;
    }

    /**
     * @return ?TenderCashDetails
     */
    public function getCashDetails(): ?TenderCashDetails
    {
        return $this->cashDetails;
    }

    /**
     * @param ?TenderCashDetails $value
     */
    public function setCashDetails(?TenderCashDetails $value = null): self
    {
        $this->cashDetails = $value;
        return $this;
    }

    /**
     * @return ?TenderBankAccountDetails
     */
    public function getBankAccountDetails(): ?TenderBankAccountDetails
    {
        return $this->bankAccountDetails;
    }

    /**
     * @param ?TenderBankAccountDetails $value
     */
    public function setBankAccountDetails(?TenderBankAccountDetails $value = null): self
    {
        $this->bankAccountDetails = $value;
        return $this;
    }

    /**
     * @return ?TenderBuyNowPayLaterDetails
     */
    public function getBuyNowPayLaterDetails(): ?TenderBuyNowPayLaterDetails
    {
        return $this->buyNowPayLaterDetails;
    }

    /**
     * @param ?TenderBuyNowPayLaterDetails $value
     */
    public function setBuyNowPayLaterDetails(?TenderBuyNowPayLaterDetails $value = null): self
    {
        $this->buyNowPayLaterDetails = $value;
        return $this;
    }

    /**
     * @return ?TenderSquareAccountDetails
     */
    public function getSquareAccountDetails(): ?TenderSquareAccountDetails
    {
        return $this->squareAccountDetails;
    }

    /**
     * @param ?TenderSquareAccountDetails $value
     */
    public function setSquareAccountDetails(?TenderSquareAccountDetails $value = null): self
    {
        $this->squareAccountDetails = $value;
        return $this;
    }

    /**
     * @return ?array<AdditionalRecipient>
     */
    public function getAdditionalRecipients(): ?array
    {
        return $this->additionalRecipients;
    }

    /**
     * @param ?array<AdditionalRecipient> $value
     */
    public function setAdditionalRecipients(?array $value = null): self
    {
        $this->additionalRecipients = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getPaymentId(): ?string
    {
        return $this->paymentId;
    }

    /**
     * @param ?string $value
     */
    public function setPaymentId(?string $value = null): self
    {
        $this->paymentId = $value;
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
