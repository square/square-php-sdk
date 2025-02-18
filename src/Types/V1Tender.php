<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * A tender represents a discrete monetary exchange. Square represents this
 * exchange as a money object with a specific currency and amount, where the
 * amount is given in the smallest denomination of the given currency.
 *
 * Square POS can accept more than one form of tender for a single payment (such
 * as by splitting a bill between a credit card and a gift card). The `tender`
 * field of the Payment object lists all forms of tender used for the payment.
 *
 * Split tender payments behave slightly differently from single tender payments:
 *
 * The receipt_url for a split tender corresponds only to the first tender listed
 * in the tender field. To get the receipt URLs for the remaining tenders, use
 * the receipt_url fields of the corresponding Tender objects.
 *
 * *A note on gift cards**: when a customer purchases a Square gift card from a
 * merchant, the merchant receives the full amount of the gift card in the
 * associated payment.
 *
 * When that gift card is used as a tender, the balance of the gift card is
 * reduced and the merchant receives no funds. A `Tender` object with a type of
 * `SQUARE_GIFT_CARD` indicates a gift card was used for some or all of the
 * associated payment.
 */
class V1Tender extends JsonSerializableType
{
    /**
     * @var ?string $id The tender's unique ID.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * The type of tender.
     * See [V1TenderType](#type-v1tendertype) for possible values
     *
     * @var ?value-of<V1TenderType> $type
     */
    #[JsonProperty('type')]
    private ?string $type;

    /**
     * @var ?string $name A human-readable description of the tender.
     */
    #[JsonProperty('name')]
    private ?string $name;

    /**
     * @var ?string $employeeId The ID of the employee that processed the tender.
     */
    #[JsonProperty('employee_id')]
    private ?string $employeeId;

    /**
     * @var ?string $receiptUrl The URL of the receipt for the tender.
     */
    #[JsonProperty('receipt_url')]
    private ?string $receiptUrl;

    /**
     * The brand of credit card provided.
     * See [V1TenderCardBrand](#type-v1tendercardbrand) for possible values
     *
     * @var ?value-of<V1TenderCardBrand> $cardBrand
     */
    #[JsonProperty('card_brand')]
    private ?string $cardBrand;

    /**
     * @var ?string $panSuffix The last four digits of the provided credit card's account number.
     */
    #[JsonProperty('pan_suffix')]
    private ?string $panSuffix;

    /**
     * The tender's unique ID.
     * See [V1TenderEntryMethod](#type-v1tenderentrymethod) for possible values
     *
     * @var ?value-of<V1TenderEntryMethod> $entryMethod
     */
    #[JsonProperty('entry_method')]
    private ?string $entryMethod;

    /**
     * @var ?string $paymentNote Notes entered by the merchant about the tender at the time of payment, if any. Typically only present for tender with the type: OTHER.
     */
    #[JsonProperty('payment_note')]
    private ?string $paymentNote;

    /**
     * @var ?V1Money $totalMoney The total amount of money provided in this form of tender.
     */
    #[JsonProperty('total_money')]
    private ?V1Money $totalMoney;

    /**
     * @var ?V1Money $tenderedMoney The amount of total_money applied to the payment.
     */
    #[JsonProperty('tendered_money')]
    private ?V1Money $tenderedMoney;

    /**
     * @var ?string $tenderedAt The time when the tender was created, in ISO 8601 format.
     */
    #[JsonProperty('tendered_at')]
    private ?string $tenderedAt;

    /**
     * @var ?string $settledAt The time when the tender was settled, in ISO 8601 format.
     */
    #[JsonProperty('settled_at')]
    private ?string $settledAt;

    /**
     * @var ?V1Money $changeBackMoney The amount of total_money returned to the buyer as change.
     */
    #[JsonProperty('change_back_money')]
    private ?V1Money $changeBackMoney;

    /**
     * @var ?V1Money $refundedMoney The total of all refunds applied to this tender. This amount is always negative or zero.
     */
    #[JsonProperty('refunded_money')]
    private ?V1Money $refundedMoney;

    /**
     * @var ?bool $isExchange Indicates whether or not the tender is associated with an exchange. If is_exchange is true, the tender represents the value of goods returned in an exchange not the actual money paid. The exchange value reduces the tender amounts needed to pay for items purchased in the exchange.
     */
    #[JsonProperty('is_exchange')]
    private ?bool $isExchange;

    /**
     * @param array{
     *   id?: ?string,
     *   type?: ?value-of<V1TenderType>,
     *   name?: ?string,
     *   employeeId?: ?string,
     *   receiptUrl?: ?string,
     *   cardBrand?: ?value-of<V1TenderCardBrand>,
     *   panSuffix?: ?string,
     *   entryMethod?: ?value-of<V1TenderEntryMethod>,
     *   paymentNote?: ?string,
     *   totalMoney?: ?V1Money,
     *   tenderedMoney?: ?V1Money,
     *   tenderedAt?: ?string,
     *   settledAt?: ?string,
     *   changeBackMoney?: ?V1Money,
     *   refundedMoney?: ?V1Money,
     *   isExchange?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->type = $values['type'] ?? null;
        $this->name = $values['name'] ?? null;
        $this->employeeId = $values['employeeId'] ?? null;
        $this->receiptUrl = $values['receiptUrl'] ?? null;
        $this->cardBrand = $values['cardBrand'] ?? null;
        $this->panSuffix = $values['panSuffix'] ?? null;
        $this->entryMethod = $values['entryMethod'] ?? null;
        $this->paymentNote = $values['paymentNote'] ?? null;
        $this->totalMoney = $values['totalMoney'] ?? null;
        $this->tenderedMoney = $values['tenderedMoney'] ?? null;
        $this->tenderedAt = $values['tenderedAt'] ?? null;
        $this->settledAt = $values['settledAt'] ?? null;
        $this->changeBackMoney = $values['changeBackMoney'] ?? null;
        $this->refundedMoney = $values['refundedMoney'] ?? null;
        $this->isExchange = $values['isExchange'] ?? null;
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
     * @return ?value-of<V1TenderType>
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param ?value-of<V1TenderType> $value
     */
    public function setType(?string $value = null): self
    {
        $this->type = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param ?string $value
     */
    public function setName(?string $value = null): self
    {
        $this->name = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getEmployeeId(): ?string
    {
        return $this->employeeId;
    }

    /**
     * @param ?string $value
     */
    public function setEmployeeId(?string $value = null): self
    {
        $this->employeeId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getReceiptUrl(): ?string
    {
        return $this->receiptUrl;
    }

    /**
     * @param ?string $value
     */
    public function setReceiptUrl(?string $value = null): self
    {
        $this->receiptUrl = $value;
        return $this;
    }

    /**
     * @return ?value-of<V1TenderCardBrand>
     */
    public function getCardBrand(): ?string
    {
        return $this->cardBrand;
    }

    /**
     * @param ?value-of<V1TenderCardBrand> $value
     */
    public function setCardBrand(?string $value = null): self
    {
        $this->cardBrand = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getPanSuffix(): ?string
    {
        return $this->panSuffix;
    }

    /**
     * @param ?string $value
     */
    public function setPanSuffix(?string $value = null): self
    {
        $this->panSuffix = $value;
        return $this;
    }

    /**
     * @return ?value-of<V1TenderEntryMethod>
     */
    public function getEntryMethod(): ?string
    {
        return $this->entryMethod;
    }

    /**
     * @param ?value-of<V1TenderEntryMethod> $value
     */
    public function setEntryMethod(?string $value = null): self
    {
        $this->entryMethod = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getPaymentNote(): ?string
    {
        return $this->paymentNote;
    }

    /**
     * @param ?string $value
     */
    public function setPaymentNote(?string $value = null): self
    {
        $this->paymentNote = $value;
        return $this;
    }

    /**
     * @return ?V1Money
     */
    public function getTotalMoney(): ?V1Money
    {
        return $this->totalMoney;
    }

    /**
     * @param ?V1Money $value
     */
    public function setTotalMoney(?V1Money $value = null): self
    {
        $this->totalMoney = $value;
        return $this;
    }

    /**
     * @return ?V1Money
     */
    public function getTenderedMoney(): ?V1Money
    {
        return $this->tenderedMoney;
    }

    /**
     * @param ?V1Money $value
     */
    public function setTenderedMoney(?V1Money $value = null): self
    {
        $this->tenderedMoney = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getTenderedAt(): ?string
    {
        return $this->tenderedAt;
    }

    /**
     * @param ?string $value
     */
    public function setTenderedAt(?string $value = null): self
    {
        $this->tenderedAt = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getSettledAt(): ?string
    {
        return $this->settledAt;
    }

    /**
     * @param ?string $value
     */
    public function setSettledAt(?string $value = null): self
    {
        $this->settledAt = $value;
        return $this;
    }

    /**
     * @return ?V1Money
     */
    public function getChangeBackMoney(): ?V1Money
    {
        return $this->changeBackMoney;
    }

    /**
     * @param ?V1Money $value
     */
    public function setChangeBackMoney(?V1Money $value = null): self
    {
        $this->changeBackMoney = $value;
        return $this;
    }

    /**
     * @return ?V1Money
     */
    public function getRefundedMoney(): ?V1Money
    {
        return $this->refundedMoney;
    }

    /**
     * @param ?V1Money $value
     */
    public function setRefundedMoney(?V1Money $value = null): self
    {
        $this->refundedMoney = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getIsExchange(): ?bool
    {
        return $this->isExchange;
    }

    /**
     * @param ?bool $value
     */
    public function setIsExchange(?bool $value = null): self
    {
        $this->isExchange = $value;
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
