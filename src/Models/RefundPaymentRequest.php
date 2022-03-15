<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

/**
 * Describes a request to refund a payment using [RefundPayment]($e/Refunds/RefundPayment).
 */
class RefundPaymentRequest implements \JsonSerializable
{
    /**
     * @var string
     */
    private $idempotencyKey;

    /**
     * @var Money
     */
    private $amountMoney;

    /**
     * @var Money|null
     */
    private $appFeeMoney;

    /**
     * @var string|null
     */
    private $paymentId;

    /**
     * @var string|null
     */
    private $reason;

    /**
     * @var string|null
     */
    private $paymentVersionToken;

    /**
     * @var string|null
     */
    private $teamMemberId;

    /**
     * @param string $idempotencyKey
     * @param Money $amountMoney
     */
    public function __construct(string $idempotencyKey, Money $amountMoney)
    {
        $this->idempotencyKey = $idempotencyKey;
        $this->amountMoney = $amountMoney;
    }

    /**
     * Returns Idempotency Key.
     *
     * A unique string that identifies this `RefundPayment` request. The key can be any valid string
     * but must be unique for every `RefundPayment` request.
     *
     * For more information, see [Idempotency](https://developer.squareup.com/docs/working-with-
     * apis/idempotency).
     */
    public function getIdempotencyKey(): string
    {
        return $this->idempotencyKey;
    }

    /**
     * Sets Idempotency Key.
     *
     * A unique string that identifies this `RefundPayment` request. The key can be any valid string
     * but must be unique for every `RefundPayment` request.
     *
     * For more information, see [Idempotency](https://developer.squareup.com/docs/working-with-
     * apis/idempotency).
     *
     * @required
     * @maps idempotency_key
     */
    public function setIdempotencyKey(string $idempotencyKey): void
    {
        $this->idempotencyKey = $idempotencyKey;
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
     * Returns App Fee Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     */
    public function getAppFeeMoney(): ?Money
    {
        return $this->appFeeMoney;
    }

    /**
     * Sets App Fee Money.
     *
     * Represents an amount of money. `Money` fields can be signed or unsigned.
     * Fields that do not explicitly define whether they are signed or unsigned are
     * considered unsigned and can only hold positive amounts. For signed fields, the
     * sign of the value indicates the purpose of the money transfer. See
     * [Working with Monetary Amounts](https://developer.squareup.com/docs/build-basics/working-with-
     * monetary-amounts)
     * for more information.
     *
     * @maps app_fee_money
     */
    public function setAppFeeMoney(?Money $appFeeMoney): void
    {
        $this->appFeeMoney = $appFeeMoney;
    }

    /**
     * Returns Payment Id.
     *
     * The unique ID of the payment being refunded. Must be provided and non-empty.
     */
    public function getPaymentId(): ?string
    {
        return $this->paymentId;
    }

    /**
     * Sets Payment Id.
     *
     * The unique ID of the payment being refunded. Must be provided and non-empty.
     *
     * @maps payment_id
     */
    public function setPaymentId(?string $paymentId): void
    {
        $this->paymentId = $paymentId;
    }

    /**
     * Returns Reason.
     *
     * A description of the reason for the refund.
     */
    public function getReason(): ?string
    {
        return $this->reason;
    }

    /**
     * Sets Reason.
     *
     * A description of the reason for the refund.
     *
     * @maps reason
     */
    public function setReason(?string $reason): void
    {
        $this->reason = $reason;
    }

    /**
     * Returns Payment Version Token.
     *
     * Used for optimistic concurrency. This opaque token identifies the current `Payment`
     * version that the caller expects. If the server has a different version of the Payment,
     * the update fails and a response with a VERSION_MISMATCH error is returned.
     * If the versions match, or the field is not provided, the refund proceeds as normal.
     */
    public function getPaymentVersionToken(): ?string
    {
        return $this->paymentVersionToken;
    }

    /**
     * Sets Payment Version Token.
     *
     * Used for optimistic concurrency. This opaque token identifies the current `Payment`
     * version that the caller expects. If the server has a different version of the Payment,
     * the update fails and a response with a VERSION_MISMATCH error is returned.
     * If the versions match, or the field is not provided, the refund proceeds as normal.
     *
     * @maps payment_version_token
     */
    public function setPaymentVersionToken(?string $paymentVersionToken): void
    {
        $this->paymentVersionToken = $paymentVersionToken;
    }

    /**
     * Returns Team Member Id.
     *
     * An optional [TeamMember]($m/TeamMember) ID to associate with this refund.
     */
    public function getTeamMemberId(): ?string
    {
        return $this->teamMemberId;
    }

    /**
     * Sets Team Member Id.
     *
     * An optional [TeamMember]($m/TeamMember) ID to associate with this refund.
     *
     * @maps team_member_id
     */
    public function setTeamMemberId(?string $teamMemberId): void
    {
        $this->teamMemberId = $teamMemberId;
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
        $json['idempotency_key']           = $this->idempotencyKey;
        $json['amount_money']              = $this->amountMoney;
        if (isset($this->appFeeMoney)) {
            $json['app_fee_money']         = $this->appFeeMoney;
        }
        if (isset($this->paymentId)) {
            $json['payment_id']            = $this->paymentId;
        }
        if (isset($this->reason)) {
            $json['reason']                = $this->reason;
        }
        if (isset($this->paymentVersionToken)) {
            $json['payment_version_token'] = $this->paymentVersionToken;
        }
        if (isset($this->teamMemberId)) {
            $json['team_member_id']        = $this->teamMemberId;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
