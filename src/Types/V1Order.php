<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * V1Order
 */
class V1Order extends JsonSerializableType
{
    /**
     * @var ?array<Error> $errors Any errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @var ?string $id The order's unique identifier.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?string $buyerEmail The email address of the order's buyer.
     */
    #[JsonProperty('buyer_email')]
    private ?string $buyerEmail;

    /**
     * @var ?string $recipientName The name of the order's buyer.
     */
    #[JsonProperty('recipient_name')]
    private ?string $recipientName;

    /**
     * @var ?string $recipientPhoneNumber The phone number to use for the order's delivery.
     */
    #[JsonProperty('recipient_phone_number')]
    private ?string $recipientPhoneNumber;

    /**
     * Whether the tax is an ADDITIVE tax or an INCLUSIVE tax.
     * See [V1OrderState](#type-v1orderstate) for possible values
     *
     * @var ?value-of<V1OrderState> $state
     */
    #[JsonProperty('state')]
    private ?string $state;

    /**
     * @var ?Address $shippingAddress The address to ship the order to.
     */
    #[JsonProperty('shipping_address')]
    private ?Address $shippingAddress;

    /**
     * @var ?V1Money $subtotalMoney The amount of all items purchased in the order, before taxes and shipping.
     */
    #[JsonProperty('subtotal_money')]
    private ?V1Money $subtotalMoney;

    /**
     * @var ?V1Money $totalShippingMoney The shipping cost for the order.
     */
    #[JsonProperty('total_shipping_money')]
    private ?V1Money $totalShippingMoney;

    /**
     * @var ?V1Money $totalTaxMoney The total of all taxes applied to the order.
     */
    #[JsonProperty('total_tax_money')]
    private ?V1Money $totalTaxMoney;

    /**
     * @var ?V1Money $totalPriceMoney The total cost of the order.
     */
    #[JsonProperty('total_price_money')]
    private ?V1Money $totalPriceMoney;

    /**
     * @var ?V1Money $totalDiscountMoney The total of all discounts applied to the order.
     */
    #[JsonProperty('total_discount_money')]
    private ?V1Money $totalDiscountMoney;

    /**
     * @var ?string $createdAt The time when the order was created, in ISO 8601 format.
     */
    #[JsonProperty('created_at')]
    private ?string $createdAt;

    /**
     * @var ?string $updatedAt The time when the order was last modified, in ISO 8601 format.
     */
    #[JsonProperty('updated_at')]
    private ?string $updatedAt;

    /**
     * @var ?string $expiresAt The time when the order expires if no action is taken, in ISO 8601 format.
     */
    #[JsonProperty('expires_at')]
    private ?string $expiresAt;

    /**
     * @var ?string $paymentId The unique identifier of the payment associated with the order.
     */
    #[JsonProperty('payment_id')]
    private ?string $paymentId;

    /**
     * @var ?string $buyerNote A note provided by the buyer when the order was created, if any.
     */
    #[JsonProperty('buyer_note')]
    private ?string $buyerNote;

    /**
     * @var ?string $completedNote A note provided by the merchant when the order's state was set to COMPLETED, if any
     */
    #[JsonProperty('completed_note')]
    private ?string $completedNote;

    /**
     * @var ?string $refundedNote A note provided by the merchant when the order's state was set to REFUNDED, if any.
     */
    #[JsonProperty('refunded_note')]
    private ?string $refundedNote;

    /**
     * @var ?string $canceledNote A note provided by the merchant when the order's state was set to CANCELED, if any.
     */
    #[JsonProperty('canceled_note')]
    private ?string $canceledNote;

    /**
     * @var ?V1Tender $tender The tender used to pay for the order.
     */
    #[JsonProperty('tender')]
    private ?V1Tender $tender;

    /**
     * @var ?array<V1OrderHistoryEntry> $orderHistory The history of actions associated with the order.
     */
    #[JsonProperty('order_history'), ArrayType([V1OrderHistoryEntry::class])]
    private ?array $orderHistory;

    /**
     * @var ?string $promoCode The promo code provided by the buyer, if any.
     */
    #[JsonProperty('promo_code')]
    private ?string $promoCode;

    /**
     * @var ?string $btcReceiveAddress For Bitcoin transactions, the address that the buyer sent Bitcoin to.
     */
    #[JsonProperty('btc_receive_address')]
    private ?string $btcReceiveAddress;

    /**
     * @var ?float $btcPriceSatoshi For Bitcoin transactions, the price of the buyer's order in satoshi (100 million satoshi equals 1 BTC).
     */
    #[JsonProperty('btc_price_satoshi')]
    private ?float $btcPriceSatoshi;

    /**
     * @param array{
     *   errors?: ?array<Error>,
     *   id?: ?string,
     *   buyerEmail?: ?string,
     *   recipientName?: ?string,
     *   recipientPhoneNumber?: ?string,
     *   state?: ?value-of<V1OrderState>,
     *   shippingAddress?: ?Address,
     *   subtotalMoney?: ?V1Money,
     *   totalShippingMoney?: ?V1Money,
     *   totalTaxMoney?: ?V1Money,
     *   totalPriceMoney?: ?V1Money,
     *   totalDiscountMoney?: ?V1Money,
     *   createdAt?: ?string,
     *   updatedAt?: ?string,
     *   expiresAt?: ?string,
     *   paymentId?: ?string,
     *   buyerNote?: ?string,
     *   completedNote?: ?string,
     *   refundedNote?: ?string,
     *   canceledNote?: ?string,
     *   tender?: ?V1Tender,
     *   orderHistory?: ?array<V1OrderHistoryEntry>,
     *   promoCode?: ?string,
     *   btcReceiveAddress?: ?string,
     *   btcPriceSatoshi?: ?float,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->errors = $values['errors'] ?? null;
        $this->id = $values['id'] ?? null;
        $this->buyerEmail = $values['buyerEmail'] ?? null;
        $this->recipientName = $values['recipientName'] ?? null;
        $this->recipientPhoneNumber = $values['recipientPhoneNumber'] ?? null;
        $this->state = $values['state'] ?? null;
        $this->shippingAddress = $values['shippingAddress'] ?? null;
        $this->subtotalMoney = $values['subtotalMoney'] ?? null;
        $this->totalShippingMoney = $values['totalShippingMoney'] ?? null;
        $this->totalTaxMoney = $values['totalTaxMoney'] ?? null;
        $this->totalPriceMoney = $values['totalPriceMoney'] ?? null;
        $this->totalDiscountMoney = $values['totalDiscountMoney'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
        $this->expiresAt = $values['expiresAt'] ?? null;
        $this->paymentId = $values['paymentId'] ?? null;
        $this->buyerNote = $values['buyerNote'] ?? null;
        $this->completedNote = $values['completedNote'] ?? null;
        $this->refundedNote = $values['refundedNote'] ?? null;
        $this->canceledNote = $values['canceledNote'] ?? null;
        $this->tender = $values['tender'] ?? null;
        $this->orderHistory = $values['orderHistory'] ?? null;
        $this->promoCode = $values['promoCode'] ?? null;
        $this->btcReceiveAddress = $values['btcReceiveAddress'] ?? null;
        $this->btcPriceSatoshi = $values['btcPriceSatoshi'] ?? null;
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
    public function getBuyerEmail(): ?string
    {
        return $this->buyerEmail;
    }

    /**
     * @param ?string $value
     */
    public function setBuyerEmail(?string $value = null): self
    {
        $this->buyerEmail = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getRecipientName(): ?string
    {
        return $this->recipientName;
    }

    /**
     * @param ?string $value
     */
    public function setRecipientName(?string $value = null): self
    {
        $this->recipientName = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getRecipientPhoneNumber(): ?string
    {
        return $this->recipientPhoneNumber;
    }

    /**
     * @param ?string $value
     */
    public function setRecipientPhoneNumber(?string $value = null): self
    {
        $this->recipientPhoneNumber = $value;
        return $this;
    }

    /**
     * @return ?value-of<V1OrderState>
     */
    public function getState(): ?string
    {
        return $this->state;
    }

    /**
     * @param ?value-of<V1OrderState> $value
     */
    public function setState(?string $value = null): self
    {
        $this->state = $value;
        return $this;
    }

    /**
     * @return ?Address
     */
    public function getShippingAddress(): ?Address
    {
        return $this->shippingAddress;
    }

    /**
     * @param ?Address $value
     */
    public function setShippingAddress(?Address $value = null): self
    {
        $this->shippingAddress = $value;
        return $this;
    }

    /**
     * @return ?V1Money
     */
    public function getSubtotalMoney(): ?V1Money
    {
        return $this->subtotalMoney;
    }

    /**
     * @param ?V1Money $value
     */
    public function setSubtotalMoney(?V1Money $value = null): self
    {
        $this->subtotalMoney = $value;
        return $this;
    }

    /**
     * @return ?V1Money
     */
    public function getTotalShippingMoney(): ?V1Money
    {
        return $this->totalShippingMoney;
    }

    /**
     * @param ?V1Money $value
     */
    public function setTotalShippingMoney(?V1Money $value = null): self
    {
        $this->totalShippingMoney = $value;
        return $this;
    }

    /**
     * @return ?V1Money
     */
    public function getTotalTaxMoney(): ?V1Money
    {
        return $this->totalTaxMoney;
    }

    /**
     * @param ?V1Money $value
     */
    public function setTotalTaxMoney(?V1Money $value = null): self
    {
        $this->totalTaxMoney = $value;
        return $this;
    }

    /**
     * @return ?V1Money
     */
    public function getTotalPriceMoney(): ?V1Money
    {
        return $this->totalPriceMoney;
    }

    /**
     * @param ?V1Money $value
     */
    public function setTotalPriceMoney(?V1Money $value = null): self
    {
        $this->totalPriceMoney = $value;
        return $this;
    }

    /**
     * @return ?V1Money
     */
    public function getTotalDiscountMoney(): ?V1Money
    {
        return $this->totalDiscountMoney;
    }

    /**
     * @param ?V1Money $value
     */
    public function setTotalDiscountMoney(?V1Money $value = null): self
    {
        $this->totalDiscountMoney = $value;
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
     * @return ?string
     */
    public function getExpiresAt(): ?string
    {
        return $this->expiresAt;
    }

    /**
     * @param ?string $value
     */
    public function setExpiresAt(?string $value = null): self
    {
        $this->expiresAt = $value;
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
     * @return ?string
     */
    public function getBuyerNote(): ?string
    {
        return $this->buyerNote;
    }

    /**
     * @param ?string $value
     */
    public function setBuyerNote(?string $value = null): self
    {
        $this->buyerNote = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCompletedNote(): ?string
    {
        return $this->completedNote;
    }

    /**
     * @param ?string $value
     */
    public function setCompletedNote(?string $value = null): self
    {
        $this->completedNote = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getRefundedNote(): ?string
    {
        return $this->refundedNote;
    }

    /**
     * @param ?string $value
     */
    public function setRefundedNote(?string $value = null): self
    {
        $this->refundedNote = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCanceledNote(): ?string
    {
        return $this->canceledNote;
    }

    /**
     * @param ?string $value
     */
    public function setCanceledNote(?string $value = null): self
    {
        $this->canceledNote = $value;
        return $this;
    }

    /**
     * @return ?V1Tender
     */
    public function getTender(): ?V1Tender
    {
        return $this->tender;
    }

    /**
     * @param ?V1Tender $value
     */
    public function setTender(?V1Tender $value = null): self
    {
        $this->tender = $value;
        return $this;
    }

    /**
     * @return ?array<V1OrderHistoryEntry>
     */
    public function getOrderHistory(): ?array
    {
        return $this->orderHistory;
    }

    /**
     * @param ?array<V1OrderHistoryEntry> $value
     */
    public function setOrderHistory(?array $value = null): self
    {
        $this->orderHistory = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getPromoCode(): ?string
    {
        return $this->promoCode;
    }

    /**
     * @param ?string $value
     */
    public function setPromoCode(?string $value = null): self
    {
        $this->promoCode = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getBtcReceiveAddress(): ?string
    {
        return $this->btcReceiveAddress;
    }

    /**
     * @param ?string $value
     */
    public function setBtcReceiveAddress(?string $value = null): self
    {
        $this->btcReceiveAddress = $value;
        return $this;
    }

    /**
     * @return ?float
     */
    public function getBtcPriceSatoshi(): ?float
    {
        return $this->btcPriceSatoshi;
    }

    /**
     * @param ?float $value
     */
    public function setBtcPriceSatoshi(?float $value = null): self
    {
        $this->btcPriceSatoshi = $value;
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
