<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents details about a `REFUND` [gift card activity type](entity:GiftCardActivityType).
 */
class GiftCardActivityRefund extends JsonSerializableType
{
    /**
     * The ID of the refunded `REDEEM` gift card activity. Square populates this field if the
     * `payment_id` in the corresponding [RefundPayment](api-endpoint:Refunds-RefundPayment) request
     * represents a gift card redemption.
     *
     * For applications that use a custom payment processing system, this field is required when creating
     * a `REFUND` activity. The provided `REDEEM` activity ID must be linked to the same gift card.
     *
     * @var ?string $redeemActivityId
     */
    #[JsonProperty('redeem_activity_id')]
    private ?string $redeemActivityId;

    /**
     * The amount added to the gift card for the refund. This value is a positive integer.
     *
     * This field is required when creating a `REFUND` activity. The amount can represent a full or partial refund.
     *
     * @var ?Money $amountMoney
     */
    #[JsonProperty('amount_money')]
    private ?Money $amountMoney;

    /**
     * @var ?string $referenceId A client-specified ID that associates the gift card activity with an entity in another system.
     */
    #[JsonProperty('reference_id')]
    private ?string $referenceId;

    /**
     * The ID of the refunded payment. Square populates this field if the refund is for a
     * payment processed by Square. This field matches the `payment_id` in the corresponding
     * [RefundPayment](api-endpoint:Refunds-RefundPayment) request.
     *
     * @var ?string $paymentId
     */
    #[JsonProperty('payment_id')]
    private ?string $paymentId;

    /**
     * @param array{
     *   redeemActivityId?: ?string,
     *   amountMoney?: ?Money,
     *   referenceId?: ?string,
     *   paymentId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->redeemActivityId = $values['redeemActivityId'] ?? null;
        $this->amountMoney = $values['amountMoney'] ?? null;
        $this->referenceId = $values['referenceId'] ?? null;
        $this->paymentId = $values['paymentId'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getRedeemActivityId(): ?string
    {
        return $this->redeemActivityId;
    }

    /**
     * @param ?string $value
     */
    public function setRedeemActivityId(?string $value = null): self
    {
        $this->redeemActivityId = $value;
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
