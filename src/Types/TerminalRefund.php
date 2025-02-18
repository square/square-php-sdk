<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents a payment refund processed by the Square Terminal. Only supports Interac (Canadian debit network) payment refunds.
 */
class TerminalRefund extends JsonSerializableType
{
    /**
     * @var ?string $id A unique ID for this `TerminalRefund`.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?string $refundId The reference to the payment refund created by completing this `TerminalRefund`.
     */
    #[JsonProperty('refund_id')]
    private ?string $refundId;

    /**
     * @var string $paymentId The unique ID of the payment being refunded.
     */
    #[JsonProperty('payment_id')]
    private string $paymentId;

    /**
     * @var ?string $orderId The reference to the Square order ID for the payment identified by the `payment_id`.
     */
    #[JsonProperty('order_id')]
    private ?string $orderId;

    /**
     * The amount of money, inclusive of `tax_money`, that the `TerminalRefund` should return.
     * This value is limited to the amount taken in the original payment minus any completed or
     * pending refunds.
     *
     * @var Money $amountMoney
     */
    #[JsonProperty('amount_money')]
    private Money $amountMoney;

    /**
     * @var string $reason A description of the reason for the refund.
     */
    #[JsonProperty('reason')]
    private string $reason;

    /**
     * The unique ID of the device intended for this `TerminalRefund`.
     * The Id can be retrieved from /v2/devices api.
     *
     * @var string $deviceId
     */
    #[JsonProperty('device_id')]
    private string $deviceId;

    /**
     * The RFC 3339 duration, after which the refund is automatically canceled.
     * A `TerminalRefund` that is `PENDING` is automatically `CANCELED` and has a cancellation reason
     * of `TIMED_OUT`.
     *
     * Default: 5 minutes from creation.
     *
     * Maximum: 5 minutes
     *
     * @var ?string $deadlineDuration
     */
    #[JsonProperty('deadline_duration')]
    private ?string $deadlineDuration;

    /**
     * The status of the `TerminalRefund`.
     * Options: `PENDING`, `IN_PROGRESS`, `CANCEL_REQUESTED`, `CANCELED`, or `COMPLETED`.
     *
     * @var ?string $status
     */
    #[JsonProperty('status')]
    private ?string $status;

    /**
     * Present if the status is `CANCELED`.
     * See [ActionCancelReason](#type-actioncancelreason) for possible values
     *
     * @var ?value-of<ActionCancelReason> $cancelReason
     */
    #[JsonProperty('cancel_reason')]
    private ?string $cancelReason;

    /**
     * @var ?string $createdAt The time when the `TerminalRefund` was created, as an RFC 3339 timestamp.
     */
    #[JsonProperty('created_at')]
    private ?string $createdAt;

    /**
     * @var ?string $updatedAt The time when the `TerminalRefund` was last updated, as an RFC 3339 timestamp.
     */
    #[JsonProperty('updated_at')]
    private ?string $updatedAt;

    /**
     * @var ?string $appId The ID of the application that created the refund.
     */
    #[JsonProperty('app_id')]
    private ?string $appId;

    /**
     * @var ?string $locationId The location of the device where the `TerminalRefund` was directed.
     */
    #[JsonProperty('location_id')]
    private ?string $locationId;

    /**
     * @param array{
     *   paymentId: string,
     *   amountMoney: Money,
     *   reason: string,
     *   deviceId: string,
     *   id?: ?string,
     *   refundId?: ?string,
     *   orderId?: ?string,
     *   deadlineDuration?: ?string,
     *   status?: ?string,
     *   cancelReason?: ?value-of<ActionCancelReason>,
     *   createdAt?: ?string,
     *   updatedAt?: ?string,
     *   appId?: ?string,
     *   locationId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->id = $values['id'] ?? null;
        $this->refundId = $values['refundId'] ?? null;
        $this->paymentId = $values['paymentId'];
        $this->orderId = $values['orderId'] ?? null;
        $this->amountMoney = $values['amountMoney'];
        $this->reason = $values['reason'];
        $this->deviceId = $values['deviceId'];
        $this->deadlineDuration = $values['deadlineDuration'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->cancelReason = $values['cancelReason'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
        $this->updatedAt = $values['updatedAt'] ?? null;
        $this->appId = $values['appId'] ?? null;
        $this->locationId = $values['locationId'] ?? null;
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
    public function getRefundId(): ?string
    {
        return $this->refundId;
    }

    /**
     * @param ?string $value
     */
    public function setRefundId(?string $value = null): self
    {
        $this->refundId = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getPaymentId(): string
    {
        return $this->paymentId;
    }

    /**
     * @param string $value
     */
    public function setPaymentId(string $value): self
    {
        $this->paymentId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getOrderId(): ?string
    {
        return $this->orderId;
    }

    /**
     * @param ?string $value
     */
    public function setOrderId(?string $value = null): self
    {
        $this->orderId = $value;
        return $this;
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
     * @return string
     */
    public function getReason(): string
    {
        return $this->reason;
    }

    /**
     * @param string $value
     */
    public function setReason(string $value): self
    {
        $this->reason = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getDeviceId(): string
    {
        return $this->deviceId;
    }

    /**
     * @param string $value
     */
    public function setDeviceId(string $value): self
    {
        $this->deviceId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getDeadlineDuration(): ?string
    {
        return $this->deadlineDuration;
    }

    /**
     * @param ?string $value
     */
    public function setDeadlineDuration(?string $value = null): self
    {
        $this->deadlineDuration = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param ?string $value
     */
    public function setStatus(?string $value = null): self
    {
        $this->status = $value;
        return $this;
    }

    /**
     * @return ?value-of<ActionCancelReason>
     */
    public function getCancelReason(): ?string
    {
        return $this->cancelReason;
    }

    /**
     * @param ?value-of<ActionCancelReason> $value
     */
    public function setCancelReason(?string $value = null): self
    {
        $this->cancelReason = $value;
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
    public function getAppId(): ?string
    {
        return $this->appId;
    }

    /**
     * @param ?string $value
     */
    public function setAppId(?string $value = null): self
    {
        $this->appId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getLocationId(): ?string
    {
        return $this->locationId;
    }

    /**
     * @param ?string $value
     */
    public function setLocationId(?string $value = null): self
    {
        $this->locationId = $value;
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
