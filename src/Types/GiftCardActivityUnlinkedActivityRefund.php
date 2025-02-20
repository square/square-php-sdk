<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents details about an `UNLINKED_ACTIVITY_REFUND` [gift card activity type](entity:GiftCardActivityType).
 */
class GiftCardActivityUnlinkedActivityRefund extends JsonSerializableType
{
    /**
     * @var Money $amountMoney The amount added to the gift card for the refund. This value is a positive integer.
     */
    #[JsonProperty('amount_money')]
    private Money $amountMoney;

    /**
     * @var ?string $referenceId A client-specified ID that associates the gift card activity with an entity in another system.
     */
    #[JsonProperty('reference_id')]
    private ?string $referenceId;

    /**
     * @var ?string $paymentId The ID of the refunded payment. This field is not used starting in Square version 2022-06-16.
     */
    #[JsonProperty('payment_id')]
    private ?string $paymentId;

    /**
     * @param array{
     *   amountMoney: Money,
     *   referenceId?: ?string,
     *   paymentId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->amountMoney = $values['amountMoney'];
        $this->referenceId = $values['referenceId'] ?? null;
        $this->paymentId = $values['paymentId'] ?? null;
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
