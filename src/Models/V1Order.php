<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * V1Order
 */
class V1Order implements \JsonSerializable
{
    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * @var string|null
     */
    private $id;

    /**
     * @var string|null
     */
    private $buyerEmail;

    /**
     * @var string|null
     */
    private $recipientName;

    /**
     * @var string|null
     */
    private $recipientPhoneNumber;

    /**
     * @var string|null
     */
    private $state;

    /**
     * @var Address|null
     */
    private $shippingAddress;

    /**
     * @var V1Money|null
     */
    private $subtotalMoney;

    /**
     * @var V1Money|null
     */
    private $totalShippingMoney;

    /**
     * @var V1Money|null
     */
    private $totalTaxMoney;

    /**
     * @var V1Money|null
     */
    private $totalPriceMoney;

    /**
     * @var V1Money|null
     */
    private $totalDiscountMoney;

    /**
     * @var string|null
     */
    private $createdAt;

    /**
     * @var string|null
     */
    private $updatedAt;

    /**
     * @var string|null
     */
    private $expiresAt;

    /**
     * @var string|null
     */
    private $paymentId;

    /**
     * @var string|null
     */
    private $buyerNote;

    /**
     * @var string|null
     */
    private $completedNote;

    /**
     * @var string|null
     */
    private $refundedNote;

    /**
     * @var string|null
     */
    private $canceledNote;

    /**
     * @var V1Tender|null
     */
    private $tender;

    /**
     * @var V1OrderHistoryEntry[]|null
     */
    private $orderHistory;

    /**
     * @var string|null
     */
    private $promoCode;

    /**
     * @var string|null
     */
    private $btcReceiveAddress;

    /**
     * @var float|null
     */
    private $btcPriceSatoshi;

    /**
     * Returns Errors.
     *
     * Any errors that occurred during the request.
     *
     * @return Error[]|null
     */
    public function getErrors(): ?array
    {
        return $this->errors;
    }

    /**
     * Sets Errors.
     *
     * Any errors that occurred during the request.
     *
     * @maps errors
     *
     * @param Error[]|null $errors
     */
    public function setErrors(?array $errors): void
    {
        $this->errors = $errors;
    }

    /**
     * Returns Id.
     *
     * The order's unique identifier.
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Sets Id.
     *
     * The order's unique identifier.
     *
     * @maps id
     */
    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    /**
     * Returns Buyer Email.
     *
     * The email address of the order's buyer.
     */
    public function getBuyerEmail(): ?string
    {
        return $this->buyerEmail;
    }

    /**
     * Sets Buyer Email.
     *
     * The email address of the order's buyer.
     *
     * @maps buyer_email
     */
    public function setBuyerEmail(?string $buyerEmail): void
    {
        $this->buyerEmail = $buyerEmail;
    }

    /**
     * Returns Recipient Name.
     *
     * The name of the order's buyer.
     */
    public function getRecipientName(): ?string
    {
        return $this->recipientName;
    }

    /**
     * Sets Recipient Name.
     *
     * The name of the order's buyer.
     *
     * @maps recipient_name
     */
    public function setRecipientName(?string $recipientName): void
    {
        $this->recipientName = $recipientName;
    }

    /**
     * Returns Recipient Phone Number.
     *
     * The phone number to use for the order's delivery.
     */
    public function getRecipientPhoneNumber(): ?string
    {
        return $this->recipientPhoneNumber;
    }

    /**
     * Sets Recipient Phone Number.
     *
     * The phone number to use for the order's delivery.
     *
     * @maps recipient_phone_number
     */
    public function setRecipientPhoneNumber(?string $recipientPhoneNumber): void
    {
        $this->recipientPhoneNumber = $recipientPhoneNumber;
    }

    /**
     * Returns State.
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * Sets State.
     *
     * @maps state
     */
    public function setState(?string $state): void
    {
        $this->state = $state;
    }

    /**
     * Returns Shipping Address.
     *
     * Represents a physical address.
     */
    public function getShippingAddress(): ?Address
    {
        return $this->shippingAddress;
    }

    /**
     * Sets Shipping Address.
     *
     * Represents a physical address.
     *
     * @maps shipping_address
     */
    public function setShippingAddress(?Address $shippingAddress): void
    {
        $this->shippingAddress = $shippingAddress;
    }

    /**
     * Returns Subtotal Money.
     */
    public function getSubtotalMoney(): ?V1Money
    {
        return $this->subtotalMoney;
    }

    /**
     * Sets Subtotal Money.
     *
     * @maps subtotal_money
     */
    public function setSubtotalMoney(?V1Money $subtotalMoney): void
    {
        $this->subtotalMoney = $subtotalMoney;
    }

    /**
     * Returns Total Shipping Money.
     */
    public function getTotalShippingMoney(): ?V1Money
    {
        return $this->totalShippingMoney;
    }

    /**
     * Sets Total Shipping Money.
     *
     * @maps total_shipping_money
     */
    public function setTotalShippingMoney(?V1Money $totalShippingMoney): void
    {
        $this->totalShippingMoney = $totalShippingMoney;
    }

    /**
     * Returns Total Tax Money.
     */
    public function getTotalTaxMoney(): ?V1Money
    {
        return $this->totalTaxMoney;
    }

    /**
     * Sets Total Tax Money.
     *
     * @maps total_tax_money
     */
    public function setTotalTaxMoney(?V1Money $totalTaxMoney): void
    {
        $this->totalTaxMoney = $totalTaxMoney;
    }

    /**
     * Returns Total Price Money.
     */
    public function getTotalPriceMoney(): ?V1Money
    {
        return $this->totalPriceMoney;
    }

    /**
     * Sets Total Price Money.
     *
     * @maps total_price_money
     */
    public function setTotalPriceMoney(?V1Money $totalPriceMoney): void
    {
        $this->totalPriceMoney = $totalPriceMoney;
    }

    /**
     * Returns Total Discount Money.
     */
    public function getTotalDiscountMoney(): ?V1Money
    {
        return $this->totalDiscountMoney;
    }

    /**
     * Sets Total Discount Money.
     *
     * @maps total_discount_money
     */
    public function setTotalDiscountMoney(?V1Money $totalDiscountMoney): void
    {
        $this->totalDiscountMoney = $totalDiscountMoney;
    }

    /**
     * Returns Created At.
     *
     * The time when the order was created, in ISO 8601 format.
     */
    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    /**
     * Sets Created At.
     *
     * The time when the order was created, in ISO 8601 format.
     *
     * @maps created_at
     */
    public function setCreatedAt(?string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Returns Updated At.
     *
     * The time when the order was last modified, in ISO 8601 format.
     */
    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

    /**
     * Sets Updated At.
     *
     * The time when the order was last modified, in ISO 8601 format.
     *
     * @maps updated_at
     */
    public function setUpdatedAt(?string $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * Returns Expires At.
     *
     * The time when the order expires if no action is taken, in ISO 8601 format.
     */
    public function getExpiresAt(): ?string
    {
        return $this->expiresAt;
    }

    /**
     * Sets Expires At.
     *
     * The time when the order expires if no action is taken, in ISO 8601 format.
     *
     * @maps expires_at
     */
    public function setExpiresAt(?string $expiresAt): void
    {
        $this->expiresAt = $expiresAt;
    }

    /**
     * Returns Payment Id.
     *
     * The unique identifier of the payment associated with the order.
     */
    public function getPaymentId(): ?string
    {
        return $this->paymentId;
    }

    /**
     * Sets Payment Id.
     *
     * The unique identifier of the payment associated with the order.
     *
     * @maps payment_id
     */
    public function setPaymentId(?string $paymentId): void
    {
        $this->paymentId = $paymentId;
    }

    /**
     * Returns Buyer Note.
     *
     * A note provided by the buyer when the order was created, if any.
     */
    public function getBuyerNote(): ?string
    {
        return $this->buyerNote;
    }

    /**
     * Sets Buyer Note.
     *
     * A note provided by the buyer when the order was created, if any.
     *
     * @maps buyer_note
     */
    public function setBuyerNote(?string $buyerNote): void
    {
        $this->buyerNote = $buyerNote;
    }

    /**
     * Returns Completed Note.
     *
     * A note provided by the merchant when the order's state was set to COMPLETED, if any
     */
    public function getCompletedNote(): ?string
    {
        return $this->completedNote;
    }

    /**
     * Sets Completed Note.
     *
     * A note provided by the merchant when the order's state was set to COMPLETED, if any
     *
     * @maps completed_note
     */
    public function setCompletedNote(?string $completedNote): void
    {
        $this->completedNote = $completedNote;
    }

    /**
     * Returns Refunded Note.
     *
     * A note provided by the merchant when the order's state was set to REFUNDED, if any.
     */
    public function getRefundedNote(): ?string
    {
        return $this->refundedNote;
    }

    /**
     * Sets Refunded Note.
     *
     * A note provided by the merchant when the order's state was set to REFUNDED, if any.
     *
     * @maps refunded_note
     */
    public function setRefundedNote(?string $refundedNote): void
    {
        $this->refundedNote = $refundedNote;
    }

    /**
     * Returns Canceled Note.
     *
     * A note provided by the merchant when the order's state was set to CANCELED, if any.
     */
    public function getCanceledNote(): ?string
    {
        return $this->canceledNote;
    }

    /**
     * Sets Canceled Note.
     *
     * A note provided by the merchant when the order's state was set to CANCELED, if any.
     *
     * @maps canceled_note
     */
    public function setCanceledNote(?string $canceledNote): void
    {
        $this->canceledNote = $canceledNote;
    }

    /**
     * Returns Tender.
     *
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
    public function getTender(): ?V1Tender
    {
        return $this->tender;
    }

    /**
     * Sets Tender.
     *
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
     *
     * @maps tender
     */
    public function setTender(?V1Tender $tender): void
    {
        $this->tender = $tender;
    }

    /**
     * Returns Order History.
     *
     * The history of actions associated with the order.
     *
     * @return V1OrderHistoryEntry[]|null
     */
    public function getOrderHistory(): ?array
    {
        return $this->orderHistory;
    }

    /**
     * Sets Order History.
     *
     * The history of actions associated with the order.
     *
     * @maps order_history
     *
     * @param V1OrderHistoryEntry[]|null $orderHistory
     */
    public function setOrderHistory(?array $orderHistory): void
    {
        $this->orderHistory = $orderHistory;
    }

    /**
     * Returns Promo Code.
     *
     * The promo code provided by the buyer, if any.
     */
    public function getPromoCode(): ?string
    {
        return $this->promoCode;
    }

    /**
     * Sets Promo Code.
     *
     * The promo code provided by the buyer, if any.
     *
     * @maps promo_code
     */
    public function setPromoCode(?string $promoCode): void
    {
        $this->promoCode = $promoCode;
    }

    /**
     * Returns Btc Receive Address.
     *
     * For Bitcoin transactions, the address that the buyer sent Bitcoin to.
     */
    public function getBtcReceiveAddress(): ?string
    {
        return $this->btcReceiveAddress;
    }

    /**
     * Sets Btc Receive Address.
     *
     * For Bitcoin transactions, the address that the buyer sent Bitcoin to.
     *
     * @maps btc_receive_address
     */
    public function setBtcReceiveAddress(?string $btcReceiveAddress): void
    {
        $this->btcReceiveAddress = $btcReceiveAddress;
    }

    /**
     * Returns Btc Price Satoshi.
     *
     * For Bitcoin transactions, the price of the buyer's order in satoshi (100 million satoshi equals 1
     * BTC).
     */
    public function getBtcPriceSatoshi(): ?float
    {
        return $this->btcPriceSatoshi;
    }

    /**
     * Sets Btc Price Satoshi.
     *
     * For Bitcoin transactions, the price of the buyer's order in satoshi (100 million satoshi equals 1
     * BTC).
     *
     * @maps btc_price_satoshi
     */
    public function setBtcPriceSatoshi(?float $btcPriceSatoshi): void
    {
        $this->btcPriceSatoshi = $btcPriceSatoshi;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['errors']               = $this->errors;
        $json['id']                   = $this->id;
        $json['buyer_email']          = $this->buyerEmail;
        $json['recipient_name']       = $this->recipientName;
        $json['recipient_phone_number'] = $this->recipientPhoneNumber;
        $json['state']                = $this->state;
        $json['shipping_address']     = $this->shippingAddress;
        $json['subtotal_money']       = $this->subtotalMoney;
        $json['total_shipping_money'] = $this->totalShippingMoney;
        $json['total_tax_money']      = $this->totalTaxMoney;
        $json['total_price_money']    = $this->totalPriceMoney;
        $json['total_discount_money'] = $this->totalDiscountMoney;
        $json['created_at']           = $this->createdAt;
        $json['updated_at']           = $this->updatedAt;
        $json['expires_at']           = $this->expiresAt;
        $json['payment_id']           = $this->paymentId;
        $json['buyer_note']           = $this->buyerNote;
        $json['completed_note']       = $this->completedNote;
        $json['refunded_note']        = $this->refundedNote;
        $json['canceled_note']        = $this->canceledNote;
        $json['tender']               = $this->tender;
        $json['order_history']        = $this->orderHistory;
        $json['promo_code']           = $this->promoCode;
        $json['btc_receive_address']  = $this->btcReceiveAddress;
        $json['btc_price_satoshi']    = $this->btcPriceSatoshi;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
