<?php

namespace Square\V1Transactions\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\V1UpdateOrderRequestAction;
use Square\Core\Json\JsonProperty;

class V1UpdateOrderRequest extends JsonSerializableType
{
    /**
     * @var string $locationId The ID of the order's associated location.
     */
    private string $locationId;

    /**
     * @var string $orderId The order's Square-issued ID. You obtain this value from Order objects returned by the List Orders endpoint
     */
    private string $orderId;

    /**
     * The action to perform on the order (COMPLETE, CANCEL, or REFUND).
     * See [V1UpdateOrderRequestAction](#type-v1updateorderrequestaction) for possible values
     *
     * @var value-of<V1UpdateOrderRequestAction> $action
     */
    #[JsonProperty('action')]
    private string $action;

    /**
     * @var ?string $shippedTrackingNumber The tracking number of the shipment associated with the order. Only valid if action is COMPLETE.
     */
    #[JsonProperty('shipped_tracking_number')]
    private ?string $shippedTrackingNumber;

    /**
     * @var ?string $completedNote A merchant-specified note about the completion of the order. Only valid if action is COMPLETE.
     */
    #[JsonProperty('completed_note')]
    private ?string $completedNote;

    /**
     * @var ?string $refundedNote A merchant-specified note about the refunding of the order. Only valid if action is REFUND.
     */
    #[JsonProperty('refunded_note')]
    private ?string $refundedNote;

    /**
     * @var ?string $canceledNote A merchant-specified note about the canceling of the order. Only valid if action is CANCEL.
     */
    #[JsonProperty('canceled_note')]
    private ?string $canceledNote;

    /**
     * @param array{
     *   locationId: string,
     *   orderId: string,
     *   action: value-of<V1UpdateOrderRequestAction>,
     *   shippedTrackingNumber?: ?string,
     *   completedNote?: ?string,
     *   refundedNote?: ?string,
     *   canceledNote?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->locationId = $values['locationId'];
        $this->orderId = $values['orderId'];
        $this->action = $values['action'];
        $this->shippedTrackingNumber = $values['shippedTrackingNumber'] ?? null;
        $this->completedNote = $values['completedNote'] ?? null;
        $this->refundedNote = $values['refundedNote'] ?? null;
        $this->canceledNote = $values['canceledNote'] ?? null;
    }

    /**
     * @return string
     */
    public function getLocationId(): string
    {
        return $this->locationId;
    }

    /**
     * @param string $value
     */
    public function setLocationId(string $value): self
    {
        $this->locationId = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getOrderId(): string
    {
        return $this->orderId;
    }

    /**
     * @param string $value
     */
    public function setOrderId(string $value): self
    {
        $this->orderId = $value;
        return $this;
    }

    /**
     * @return value-of<V1UpdateOrderRequestAction>
     */
    public function getAction(): string
    {
        return $this->action;
    }

    /**
     * @param value-of<V1UpdateOrderRequestAction> $value
     */
    public function setAction(string $value): self
    {
        $this->action = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getShippedTrackingNumber(): ?string
    {
        return $this->shippedTrackingNumber;
    }

    /**
     * @param ?string $value
     */
    public function setShippedTrackingNumber(?string $value = null): self
    {
        $this->shippedTrackingNumber = $value;
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
}
