<?php

declare(strict_types=1);

namespace Square\Models;

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
class V1Tender implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $id;

    /**
     * @var string|null
     */
    private $type;

    /**
     * @var string|null
     */
    private $name;

    /**
     * @var string|null
     */
    private $employeeId;

    /**
     * @var string|null
     */
    private $receiptUrl;

    /**
     * @var string|null
     */
    private $cardBrand;

    /**
     * @var string|null
     */
    private $panSuffix;

    /**
     * @var string|null
     */
    private $entryMethod;

    /**
     * @var string|null
     */
    private $paymentNote;

    /**
     * @var V1Money|null
     */
    private $totalMoney;

    /**
     * @var V1Money|null
     */
    private $tenderedMoney;

    /**
     * @var string|null
     */
    private $tenderedAt;

    /**
     * @var string|null
     */
    private $settledAt;

    /**
     * @var V1Money|null
     */
    private $changeBackMoney;

    /**
     * @var V1Money|null
     */
    private $refundedMoney;

    /**
     * @var bool|null
     */
    private $isExchange;

    /**
     * Returns Id.
     *
     * The tender's unique ID.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Sets Id.
     *
     * The tender's unique ID.
     *
     * @maps id
     */
    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    /**
     * Returns Type.
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * Sets Type.
     *
     * @maps type
     */
    public function setType(?string $type): void
    {
        $this->type = $type;
    }

    /**
     * Returns Name.
     *
     * A human-readable description of the tender.
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Sets Name.
     *
     * A human-readable description of the tender.
     *
     * @maps name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * Returns Employee Id.
     *
     * The ID of the employee that processed the tender.
     */
    public function getEmployeeId(): ?string
    {
        return $this->employeeId;
    }

    /**
     * Sets Employee Id.
     *
     * The ID of the employee that processed the tender.
     *
     * @maps employee_id
     */
    public function setEmployeeId(?string $employeeId): void
    {
        $this->employeeId = $employeeId;
    }

    /**
     * Returns Receipt Url.
     *
     * The URL of the receipt for the tender.
     */
    public function getReceiptUrl(): ?string
    {
        return $this->receiptUrl;
    }

    /**
     * Sets Receipt Url.
     *
     * The URL of the receipt for the tender.
     *
     * @maps receipt_url
     */
    public function setReceiptUrl(?string $receiptUrl): void
    {
        $this->receiptUrl = $receiptUrl;
    }

    /**
     * Returns Card Brand.
     *
     * The brand of a credit card.
     */
    public function getCardBrand(): ?string
    {
        return $this->cardBrand;
    }

    /**
     * Sets Card Brand.
     *
     * The brand of a credit card.
     *
     * @maps card_brand
     */
    public function setCardBrand(?string $cardBrand): void
    {
        $this->cardBrand = $cardBrand;
    }

    /**
     * Returns Pan Suffix.
     *
     * The last four digits of the provided credit card's account number.
     */
    public function getPanSuffix(): ?string
    {
        return $this->panSuffix;
    }

    /**
     * Sets Pan Suffix.
     *
     * The last four digits of the provided credit card's account number.
     *
     * @maps pan_suffix
     */
    public function setPanSuffix(?string $panSuffix): void
    {
        $this->panSuffix = $panSuffix;
    }

    /**
     * Returns Entry Method.
     */
    public function getEntryMethod(): ?string
    {
        return $this->entryMethod;
    }

    /**
     * Sets Entry Method.
     *
     * @maps entry_method
     */
    public function setEntryMethod(?string $entryMethod): void
    {
        $this->entryMethod = $entryMethod;
    }

    /**
     * Returns Payment Note.
     *
     * Notes entered by the merchant about the tender at the time of payment, if any. Typically only
     * present for tender with the type: OTHER.
     */
    public function getPaymentNote(): ?string
    {
        return $this->paymentNote;
    }

    /**
     * Sets Payment Note.
     *
     * Notes entered by the merchant about the tender at the time of payment, if any. Typically only
     * present for tender with the type: OTHER.
     *
     * @maps payment_note
     */
    public function setPaymentNote(?string $paymentNote): void
    {
        $this->paymentNote = $paymentNote;
    }

    /**
     * Returns Total Money.
     */
    public function getTotalMoney(): ?V1Money
    {
        return $this->totalMoney;
    }

    /**
     * Sets Total Money.
     *
     * @maps total_money
     */
    public function setTotalMoney(?V1Money $totalMoney): void
    {
        $this->totalMoney = $totalMoney;
    }

    /**
     * Returns Tendered Money.
     */
    public function getTenderedMoney(): ?V1Money
    {
        return $this->tenderedMoney;
    }

    /**
     * Sets Tendered Money.
     *
     * @maps tendered_money
     */
    public function setTenderedMoney(?V1Money $tenderedMoney): void
    {
        $this->tenderedMoney = $tenderedMoney;
    }

    /**
     * Returns Tendered At.
     *
     * The time when the tender was created, in ISO 8601 format.
     */
    public function getTenderedAt(): ?string
    {
        return $this->tenderedAt;
    }

    /**
     * Sets Tendered At.
     *
     * The time when the tender was created, in ISO 8601 format.
     *
     * @maps tendered_at
     */
    public function setTenderedAt(?string $tenderedAt): void
    {
        $this->tenderedAt = $tenderedAt;
    }

    /**
     * Returns Settled At.
     *
     * The time when the tender was settled, in ISO 8601 format.
     */
    public function getSettledAt(): ?string
    {
        return $this->settledAt;
    }

    /**
     * Sets Settled At.
     *
     * The time when the tender was settled, in ISO 8601 format.
     *
     * @maps settled_at
     */
    public function setSettledAt(?string $settledAt): void
    {
        $this->settledAt = $settledAt;
    }

    /**
     * Returns Change Back Money.
     */
    public function getChangeBackMoney(): ?V1Money
    {
        return $this->changeBackMoney;
    }

    /**
     * Sets Change Back Money.
     *
     * @maps change_back_money
     */
    public function setChangeBackMoney(?V1Money $changeBackMoney): void
    {
        $this->changeBackMoney = $changeBackMoney;
    }

    /**
     * Returns Refunded Money.
     */
    public function getRefundedMoney(): ?V1Money
    {
        return $this->refundedMoney;
    }

    /**
     * Sets Refunded Money.
     *
     * @maps refunded_money
     */
    public function setRefundedMoney(?V1Money $refundedMoney): void
    {
        $this->refundedMoney = $refundedMoney;
    }

    /**
     * Returns Is Exchange.
     *
     * Indicates whether or not the tender is associated with an exchange. If is_exchange is true, the
     * tender represents the value of goods returned in an exchange not the actual money paid. The exchange
     * value reduces the tender amounts needed to pay for items purchased in the exchange.
     */
    public function getIsExchange(): ?bool
    {
        return $this->isExchange;
    }

    /**
     * Sets Is Exchange.
     *
     * Indicates whether or not the tender is associated with an exchange. If is_exchange is true, the
     * tender represents the value of goods returned in an exchange not the actual money paid. The exchange
     * value reduces the tender amounts needed to pay for items purchased in the exchange.
     *
     * @maps is_exchange
     */
    public function setIsExchange(?bool $isExchange): void
    {
        $this->isExchange = $isExchange;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->id)) {
            $json['id']                = $this->id;
        }
        if (isset($this->type)) {
            $json['type']              = $this->type;
        }
        if (isset($this->name)) {
            $json['name']              = $this->name;
        }
        if (isset($this->employeeId)) {
            $json['employee_id']       = $this->employeeId;
        }
        if (isset($this->receiptUrl)) {
            $json['receipt_url']       = $this->receiptUrl;
        }
        if (isset($this->cardBrand)) {
            $json['card_brand']        = $this->cardBrand;
        }
        if (isset($this->panSuffix)) {
            $json['pan_suffix']        = $this->panSuffix;
        }
        if (isset($this->entryMethod)) {
            $json['entry_method']      = $this->entryMethod;
        }
        if (isset($this->paymentNote)) {
            $json['payment_note']      = $this->paymentNote;
        }
        if (isset($this->totalMoney)) {
            $json['total_money']       = $this->totalMoney;
        }
        if (isset($this->tenderedMoney)) {
            $json['tendered_money']    = $this->tenderedMoney;
        }
        if (isset($this->tenderedAt)) {
            $json['tendered_at']       = $this->tenderedAt;
        }
        if (isset($this->settledAt)) {
            $json['settled_at']        = $this->settledAt;
        }
        if (isset($this->changeBackMoney)) {
            $json['change_back_money'] = $this->changeBackMoney;
        }
        if (isset($this->refundedMoney)) {
            $json['refunded_money']    = $this->refundedMoney;
        }
        if (isset($this->isExchange)) {
            $json['is_exchange']       = $this->isExchange;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
