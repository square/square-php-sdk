<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class PaymentBalanceActivityAppFeeRefundDetail extends JsonSerializableType
{
    /**
     * @var ?string $paymentId The ID of the payment associated with this activity.
     */
    #[JsonProperty('payment_id')]
    private ?string $paymentId;

    /**
     * @var ?string $refundId The ID of the refund associated with this activity.
     */
    #[JsonProperty('refund_id')]
    private ?string $refundId;

    /**
     * @var ?string $locationId The ID of the location of the merchant associated with the payment refund activity
     */
    #[JsonProperty('location_id')]
    private ?string $locationId;

    /**
     * @param array{
     *   paymentId?: ?string,
     *   refundId?: ?string,
     *   locationId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->paymentId = $values['paymentId'] ?? null;
        $this->refundId = $values['refundId'] ?? null;
        $this->locationId = $values['locationId'] ?? null;
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
