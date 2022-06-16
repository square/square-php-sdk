<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

/**
 * Represents details about a `REFUND` [gift card activity type]($m/GiftCardActivityType).
 */
class GiftCardActivityRefund implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $redeemActivityId;

    /**
     * @var Money|null
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
     * Returns Redeem Activity Id.
     * The ID of the refunded `REDEEM` gift card activity. Square populates this field if the
     * `payment_id` in the corresponding [RefundPayment]($e/Refunds/RefundPayment) request
     * represents a redemption made by the same gift card.
     *
     * Applications that use a custom payment processing system can use this field in a
     * [CreateGiftCardActivity]($e/GiftCardActivities/CreateGiftCardActivity)
     * request to link a refund with a `REDEEM` activity for the same gift card.
     */
    public function getRedeemActivityId(): ?string
    {
        return $this->redeemActivityId;
    }

    /**
     * Sets Redeem Activity Id.
     * The ID of the refunded `REDEEM` gift card activity. Square populates this field if the
     * `payment_id` in the corresponding [RefundPayment]($e/Refunds/RefundPayment) request
     * represents a redemption made by the same gift card.
     *
     * Applications that use a custom payment processing system can use this field in a
     * [CreateGiftCardActivity]($e/GiftCardActivities/CreateGiftCardActivity)
     * request to link a refund with a `REDEEM` activity for the same gift card.
     *
     * @maps redeem_activity_id
     */
    public function setRedeemActivityId(?string $redeemActivityId): void
    {
        $this->redeemActivityId = $redeemActivityId;
    }

    /**
     * Returns Amount Money.
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     */
    public function getAmountMoney(): ?Money
    {
        return $this->amountMoney;
    }

    /**
     * Sets Amount Money.
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     *
     * @maps amount_money
     */
    public function setAmountMoney(?Money $amountMoney): void
    {
        $this->amountMoney = $amountMoney;
    }

    /**
     * Returns Reference Id.
     * A client-specified ID that associates the gift card activity with an entity in another system.
     *
     * Applications that use a custom payment processing system can use this field to track information
     * related to an order or payment.
     */
    public function getReferenceId(): ?string
    {
        return $this->referenceId;
    }

    /**
     * Sets Reference Id.
     * A client-specified ID that associates the gift card activity with an entity in another system.
     *
     * Applications that use a custom payment processing system can use this field to track information
     * related to an order or payment.
     *
     * @maps reference_id
     */
    public function setReferenceId(?string $referenceId): void
    {
        $this->referenceId = $referenceId;
    }

    /**
     * Returns Payment Id.
     * The ID of the refunded payment. Square populates this field if the refund is for a
     * payment processed by Square. The payment source can be the same gift card or a cross-tender payment
     * from a
     * credit card or a different gift card. Cross-tender payments can only be refunded from Square Point
     * of Sale
     * or other Square products.
     */
    public function getPaymentId(): ?string
    {
        return $this->paymentId;
    }

    /**
     * Sets Payment Id.
     * The ID of the refunded payment. Square populates this field if the refund is for a
     * payment processed by Square. The payment source can be the same gift card or a cross-tender payment
     * from a
     * credit card or a different gift card. Cross-tender payments can only be refunded from Square Point
     * of Sale
     * or other Square products.
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
     * @param bool $asArrayWhenEmpty Whether to serialize this model as an array whenever no fields
     *        are set. (default: false)
     *
     * @return array|stdClass
     */
    #[\ReturnTypeWillChange] // @phan-suppress-current-line PhanUndeclaredClassAttribute for (php < 8.1)
    public function jsonSerialize(bool $asArrayWhenEmpty = false)
    {
        $json = [];
        if (isset($this->redeemActivityId)) {
            $json['redeem_activity_id'] = $this->redeemActivityId;
        }
        if (isset($this->amountMoney)) {
            $json['amount_money']       = $this->amountMoney;
        }
        if (isset($this->referenceId)) {
            $json['reference_id']       = $this->referenceId;
        }
        if (isset($this->paymentId)) {
            $json['payment_id']         = $this->paymentId;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
