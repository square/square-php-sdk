<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents details about a `REDEEM` [gift card activity type](entity:GiftCardActivityType).
 */
class GiftCardActivityRedeem extends JsonSerializableType
{
    /**
     * The amount deducted from the gift card for the redemption. This value is a positive integer.
     *
     * Applications that use a custom payment processing system must specify this amount in the
     * [CreateGiftCardActivity](api-endpoint:GiftCardActivities-CreateGiftCardActivity) request.
     *
     * @var Money $amountMoney
     */
    #[JsonProperty('amount_money')]
    private Money $amountMoney;

    /**
     * The ID of the payment that represents the gift card redemption. Square populates this field
     * if the payment was processed by Square.
     *
     * @var ?string $paymentId
     */
    #[JsonProperty('payment_id')]
    private ?string $paymentId;

    /**
     * A client-specified ID that associates the gift card activity with an entity in another system.
     *
     * Applications that use a custom payment processing system can use this field to track information
     * related to an order or payment.
     *
     * @var ?string $referenceId
     */
    #[JsonProperty('reference_id')]
    private ?string $referenceId;

    /**
     * The status of the gift card redemption. Gift cards redeemed from Square Point of Sale or the
     * Square Seller Dashboard use a two-state process: `PENDING`
     * to `COMPLETED` or `PENDING` to  `CANCELED`. Gift cards redeemed using the Gift Card Activities API
     * always have a `COMPLETED` status.
     * See [Status](#type-status) for possible values
     *
     * @var ?value-of<GiftCardActivityRedeemStatus> $status
     */
    #[JsonProperty('status')]
    private ?string $status;

    /**
     * @param array{
     *   amountMoney: Money,
     *   paymentId?: ?string,
     *   referenceId?: ?string,
     *   status?: ?value-of<GiftCardActivityRedeemStatus>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->amountMoney = $values['amountMoney'];
        $this->paymentId = $values['paymentId'] ?? null;
        $this->referenceId = $values['referenceId'] ?? null;
        $this->status = $values['status'] ?? null;
    }

    /**
     * @return Money
     */
    public function getAmountMoney(): Money
    {
        return $this->amountMoney;
    }

    /**
     * @param Money $value
     */
    public function setAmountMoney(Money $value): self
    {
        $this->amountMoney = $value;
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
    public function getReferenceId(): ?string
    {
        return $this->referenceId;
    }

    /**
     * @param ?string $value
     */
    public function setReferenceId(?string $value = null): self
    {
        $this->referenceId = $value;
        return $this;
    }

    /**
     * @return ?value-of<GiftCardActivityRedeemStatus>
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param ?value-of<GiftCardActivityRedeemStatus> $value
     */
    public function setStatus(?string $value = null): self
    {
        $this->status = $value;
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
