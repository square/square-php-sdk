<?php

namespace Square\Payments\Requests;

use Square\Core\Json\JsonSerializableType;

class CancelPaymentsRequest extends JsonSerializableType
{
    /**
     * @var string $paymentId The ID of the payment to cancel.
     */
    private string $paymentId;

    /**
     * @param array{
     *   paymentId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->paymentId = $values['paymentId'];
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
}
