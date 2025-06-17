<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class TerminalRefundUpdatedEventObject extends JsonSerializableType
{
    /**
     * @var ?TerminalRefund $refund The updated terminal refund.
     */
    #[JsonProperty('refund')]
    private ?TerminalRefund $refund;

    /**
     * @param array{
     *   refund?: ?TerminalRefund,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->refund = $values['refund'] ?? null;
    }

    /**
     * @return ?TerminalRefund
     */
    public function getRefund(): ?TerminalRefund
    {
        return $this->refund;
    }

    /**
     * @param ?TerminalRefund $value
     */
    public function setRefund(?TerminalRefund $value = null): self
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
