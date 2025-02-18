<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class PaymentBalanceActivityThirdPartyFeeRefundDetail extends JsonSerializableType
{
    /**
     * @var ?string $paymentId The ID of the payment associated with this activity.
     */
    #[JsonProperty('payment_id')]
    private ?string $paymentId;

    /**
     * @var ?string $refundId The public refund id associated with this activity.
     */
    #[JsonProperty('refund_id')]
    private ?string $refundId;

    /**
     * @param array{
     *   paymentId?: ?string,
     *   refundId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->paymentId = $values['paymentId'] ?? null;
        $this->refundId = $values['refundId'] ?? null;
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
    public function __toString(): string
    {
        return $this->toJson();
    }
}
