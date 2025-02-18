<?php

namespace Square\Payments\Requests;

use Square\Core\Json\JsonSerializableType;

class GetPaymentsRequest extends JsonSerializableType
{
    /**
     * @var string $paymentId A unique ID for the desired payment.
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
