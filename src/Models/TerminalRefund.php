<?php

declare(strict_types=1);

namespace Square\Models;

class TerminalRefund implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $id;

    /**
     * @var string|null
     */
    private $refundId;

    /**
     * @var string
     */
    private $paymentId;

    /**
     * @var string|null
     */
    private $orderId;

    /**
     * @var Money
     */
    private $amountMoney;

    /**
     * @var string|null
     */
    private $reason;

    /**
     * @var string|null
     */
    private $deviceId;

    /**
     * @var string|null
     */
    private $deadlineDuration;

    /**
     * @var string|null
     */
    private $status;

    /**
     * @var string|null
     */
    private $cancelReason;

    /**
     * @var string|null
     */
    private $createdAt;

    /**
     * @var string|null
     */
    private $updatedAt;

    /**
     * @param string $paymentId
     * @param Money $amountMoney
     */
    public function __construct(string $paymentId, Money $amountMoney)
    {
        $this->paymentId = $paymentId;
        $this->amountMoney = $amountMoney;
    }

    /**
     * Returns Id.
     *
     * A unique ID for this `TerminalRefund`
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Sets Id.
     *
     * A unique ID for this `TerminalRefund`
     *
     * @maps id
     */
    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    /**
     * Returns Refund Id.
     *
     * The reference to the payment refund created by completing this `TerminalRefund`.
     */
    public function getRefundId(): ?string
    {
        return $this->refundId;
    }

    /**
     * Sets Refund Id.
     *
     * The reference to the payment refund created by completing this `TerminalRefund`.
     *
     * @maps refund_id
     */
    public function setRefundId(?string $refundId): void
    {
        $this->refundId = $refundId;
    }

    /**
     * Returns Payment Id.
     *
     * Unique ID of the payment being refunded.
     */
    public function getPaymentId(): string
    {
        return $this->paymentId;
    }

    /**
     * Sets Payment Id.
     *
     * Unique ID of the payment being refunded.
     *
     * @required
     * @maps payment_id
     */
    public function setPaymentId(string $paymentId): void
    {
        $this->paymentId = $paymentId;
    }

    /**
     * Returns Order Id.
     *
     * The reference to the Square order id for the payment identified by the `payment_id`.
     */
    public function getOrderId(): ?string
    {
        return $this->orderId;
    }

    /**
     * Sets Order Id.
     *
     * The reference to the Square order id for the payment identified by the `payment_id`.
     *
     * @maps order_id
     */
    public function setOrderId(?string $orderId): void
    {
        $this->orderId = $orderId;
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
     * Returns Reason.
     *
     * A description of the reason for the refund.
     * Note: maximum 192 characters
     */
    public function getReason(): ?string
    {
        return $this->reason;
    }

    /**
     * Sets Reason.
     *
     * A description of the reason for the refund.
     * Note: maximum 192 characters
     *
     * @maps reason
     */
    public function setReason(?string $reason): void
    {
        $this->reason = $reason;
    }

    /**
     * Returns Device Id.
     *
     * The unique Id of the device intended for this `TerminalRefund`.
     * The Id can be retrieved from /v2/devices api.
     */
    public function getDeviceId(): ?string
    {
        return $this->deviceId;
    }

    /**
     * Sets Device Id.
     *
     * The unique Id of the device intended for this `TerminalRefund`.
     * The Id can be retrieved from /v2/devices api.
     *
     * @maps device_id
     */
    public function setDeviceId(?string $deviceId): void
    {
        $this->deviceId = $deviceId;
    }

    /**
     * Returns Deadline Duration.
     *
     * The duration as an RFC 3339 duration, after which the refund will be automatically canceled.
     * TerminalRefunds that are `PENDING` will be automatically `CANCELED` and have a cancellation reason
     * of `TIMED_OUT`
     *
     * Default: 5 minutes from creation
     *
     * Maximum: 5 minutes
     */
    public function getDeadlineDuration(): ?string
    {
        return $this->deadlineDuration;
    }

    /**
     * Sets Deadline Duration.
     *
     * The duration as an RFC 3339 duration, after which the refund will be automatically canceled.
     * TerminalRefunds that are `PENDING` will be automatically `CANCELED` and have a cancellation reason
     * of `TIMED_OUT`
     *
     * Default: 5 minutes from creation
     *
     * Maximum: 5 minutes
     *
     * @maps deadline_duration
     */
    public function setDeadlineDuration(?string $deadlineDuration): void
    {
        $this->deadlineDuration = $deadlineDuration;
    }

    /**
     * Returns Status.
     *
     * The status of the `TerminalRefund`.
     * Options: `PENDING`, `IN_PROGRESS`, `CANCELED`, `COMPLETED`
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * Sets Status.
     *
     * The status of the `TerminalRefund`.
     * Options: `PENDING`, `IN_PROGRESS`, `CANCELED`, `COMPLETED`
     *
     * @maps status
     */
    public function setStatus(?string $status): void
    {
        $this->status = $status;
    }

    /**
     * Returns Cancel Reason.
     */
    public function getCancelReason(): ?string
    {
        return $this->cancelReason;
    }

    /**
     * Sets Cancel Reason.
     *
     * @maps cancel_reason
     */
    public function setCancelReason(?string $cancelReason): void
    {
        $this->cancelReason = $cancelReason;
    }

    /**
     * Returns Created At.
     *
     * The time when the `TerminalRefund` was created as an RFC 3339 timestamp.
     */
    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    /**
     * Sets Created At.
     *
     * The time when the `TerminalRefund` was created as an RFC 3339 timestamp.
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
     * The time when the `TerminalRefund` was last updated as an RFC 3339 timestamp.
     */
    public function getUpdatedAt(): ?string
    {
        return $this->updatedAt;
    }

    /**
     * Sets Updated At.
     *
     * The time when the `TerminalRefund` was last updated as an RFC 3339 timestamp.
     *
     * @maps updated_at
     */
    public function setUpdatedAt(?string $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['id']               = $this->id;
        $json['refund_id']        = $this->refundId;
        $json['payment_id']       = $this->paymentId;
        $json['order_id']         = $this->orderId;
        $json['amount_money']     = $this->amountMoney;
        $json['reason']           = $this->reason;
        $json['device_id']        = $this->deviceId;
        $json['deadline_duration'] = $this->deadlineDuration;
        $json['status']           = $this->status;
        $json['cancel_reason']    = $this->cancelReason;
        $json['created_at']       = $this->createdAt;
        $json['updated_at']       = $this->updatedAt;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
