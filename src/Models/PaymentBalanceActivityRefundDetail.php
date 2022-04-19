<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

class PaymentBalanceActivityRefundDetail implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $paymentId;

    /**
     * @var string|null
     */
    private $refundId;

    /**
     * Returns Payment Id.
     * The ID of the payment associated with this activity.
     */
    public function getPaymentId(): ?string
    {
        return $this->paymentId;
    }

    /**
     * Sets Payment Id.
     * The ID of the payment associated with this activity.
     *
     * @maps payment_id
     */
    public function setPaymentId(?string $paymentId): void
    {
        $this->paymentId = $paymentId;
    }

    /**
     * Returns Refund Id.
     * The ID of the refund associated with this activity.
     */
    public function getRefundId(): ?string
    {
        return $this->refundId;
    }

    /**
     * Sets Refund Id.
     * The ID of the refund associated with this activity.
     *
     * @maps refund_id
     */
    public function setRefundId(?string $refundId): void
    {
        $this->refundId = $refundId;
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
        if (isset($this->paymentId)) {
            $json['payment_id'] = $this->paymentId;
        }
        if (isset($this->refundId)) {
            $json['refund_id']  = $this->refundId;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
