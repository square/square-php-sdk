<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

/**
 * V1UpdateOrderRequest
 */
class V1UpdateOrderRequest implements \JsonSerializable
{
    /**
     * @var string
     */
    private $action;

    /**
     * @var string|null
     */
    private $shippedTrackingNumber;

    /**
     * @var string|null
     */
    private $completedNote;

    /**
     * @var string|null
     */
    private $refundedNote;

    /**
     * @var string|null
     */
    private $canceledNote;

    /**
     * @param string $action
     */
    public function __construct(string $action)
    {
        $this->action = $action;
    }

    /**
     * Returns Action.
     */
    public function getAction(): string
    {
        return $this->action;
    }

    /**
     * Sets Action.
     *
     * @required
     * @maps action
     */
    public function setAction(string $action): void
    {
        $this->action = $action;
    }

    /**
     * Returns Shipped Tracking Number.
     *
     * The tracking number of the shipment associated with the order. Only valid if action is COMPLETE.
     */
    public function getShippedTrackingNumber(): ?string
    {
        return $this->shippedTrackingNumber;
    }

    /**
     * Sets Shipped Tracking Number.
     *
     * The tracking number of the shipment associated with the order. Only valid if action is COMPLETE.
     *
     * @maps shipped_tracking_number
     */
    public function setShippedTrackingNumber(?string $shippedTrackingNumber): void
    {
        $this->shippedTrackingNumber = $shippedTrackingNumber;
    }

    /**
     * Returns Completed Note.
     *
     * A merchant-specified note about the completion of the order. Only valid if action is COMPLETE.
     */
    public function getCompletedNote(): ?string
    {
        return $this->completedNote;
    }

    /**
     * Sets Completed Note.
     *
     * A merchant-specified note about the completion of the order. Only valid if action is COMPLETE.
     *
     * @maps completed_note
     */
    public function setCompletedNote(?string $completedNote): void
    {
        $this->completedNote = $completedNote;
    }

    /**
     * Returns Refunded Note.
     *
     * A merchant-specified note about the refunding of the order. Only valid if action is REFUND.
     */
    public function getRefundedNote(): ?string
    {
        return $this->refundedNote;
    }

    /**
     * Sets Refunded Note.
     *
     * A merchant-specified note about the refunding of the order. Only valid if action is REFUND.
     *
     * @maps refunded_note
     */
    public function setRefundedNote(?string $refundedNote): void
    {
        $this->refundedNote = $refundedNote;
    }

    /**
     * Returns Canceled Note.
     *
     * A merchant-specified note about the canceling of the order. Only valid if action is CANCEL.
     */
    public function getCanceledNote(): ?string
    {
        return $this->canceledNote;
    }

    /**
     * Sets Canceled Note.
     *
     * A merchant-specified note about the canceling of the order. Only valid if action is CANCEL.
     *
     * @maps canceled_note
     */
    public function setCanceledNote(?string $canceledNote): void
    {
        $this->canceledNote = $canceledNote;
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
        $json['action']                      = $this->action;
        if (isset($this->shippedTrackingNumber)) {
            $json['shipped_tracking_number'] = $this->shippedTrackingNumber;
        }
        if (isset($this->completedNote)) {
            $json['completed_note']          = $this->completedNote;
        }
        if (isset($this->refundedNote)) {
            $json['refunded_note']           = $this->refundedNote;
        }
        if (isset($this->canceledNote)) {
            $json['canceled_note']           = $this->canceledNote;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
