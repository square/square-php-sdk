<?php

namespace Square\Refunds\Requests;

use Square\Core\Json\JsonSerializableType;

class GetRefundsRequest extends JsonSerializableType
{
    /**
     * @var string $refundId The unique ID for the desired `PaymentRefund`.
     */
    private string $refundId;

    /**
     * @param array{
     *   refundId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->refundId = $values['refundId'];
    }

    /**
     * @return string
     */
    public function getRefundId(): string
    {
        return $this->refundId;
    }

    /**
     * @param string $value
     */
    public function setRefundId(string $value): self
    {
        $this->refundId = $value;
        return $this;
    }
}
