<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Present only when `GiftCardActivityType` is UNLINKED_ACTIVITY_REFUND.
 */
class GiftCardActivityUnlinkedActivityRefund implements \JsonSerializable
{
    /**
     * @var Money
     */
    private $amountMoney;

    /**
     * @var string|null
     */
    private $referenceId;

    /**
     * @var string|null
     */
    private $paymentId;

    /**
     * @param Money $amountMoney
     */
    public function __construct(Money $amountMoney)
    {
        $this->amountMoney = $amountMoney;
    }

    /**
     * Returns Amount Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     */
    public function getAmountMoney(): Money
    {
        return $this->amountMoney;
    }

    /**
     * Sets Amount Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     *
     * @required
     * @maps amount_money
     */
    public function setAmountMoney(Money $amountMoney): void
    {
        $this->amountMoney = $amountMoney;
    }

    /**
     * Returns Reference Id.
     *
     * A client-specified ID to associate an entity, in another system, with this gift card
     * activity. This can be used to track the order or payment related information when the Square
     * Payments
     * API is not being used.
     */
    public function getReferenceId(): ?string
    {
        return $this->referenceId;
    }

    /**
     * Sets Reference Id.
     *
     * A client-specified ID to associate an entity, in another system, with this gift card
     * activity. This can be used to track the order or payment related information when the Square
     * Payments
     * API is not being used.
     *
     * @maps reference_id
     */
    public function setReferenceId(?string $referenceId): void
    {
        $this->referenceId = $referenceId;
    }

    /**
     * Returns Payment Id.
     *
     * When using the Square Payments API, the ID of the payment that was refunded to this gift
     * card.
     */
    public function getPaymentId(): ?string
    {
        return $this->paymentId;
    }

    /**
     * Sets Payment Id.
     *
     * When using the Square Payments API, the ID of the payment that was refunded to this gift
     * card.
     *
     * @maps payment_id
     */
    public function setPaymentId(?string $paymentId): void
    {
        $this->paymentId = $paymentId;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['amount_money']     = $this->amountMoney;
        if (isset($this->referenceId)) {
            $json['reference_id'] = $this->referenceId;
        }
        if (isset($this->paymentId)) {
            $json['payment_id']   = $this->paymentId;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
