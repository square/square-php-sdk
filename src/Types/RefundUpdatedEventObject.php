<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class RefundUpdatedEventObject extends JsonSerializableType
{
    /**
     * @var ?PaymentRefund $refund The updated refund.
     */
    #[JsonProperty('refund')]
    private ?PaymentRefund $refund;

    /**
     * @param array{
     *   refund?: ?PaymentRefund,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->refund = $values['refund'] ?? null;
    }

    /**
     * @return ?PaymentRefund
     */
    public function getRefund(): ?PaymentRefund
    {
        return $this->refund;
    }

    /**
     * @param ?PaymentRefund $value
     */
    public function setRefund(?PaymentRefund $value = null): self
    {
        $this->refund = $value;
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
