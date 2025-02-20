<?php

namespace Square\Terminal\Requests;

use Square\Core\Json\JsonSerializableType;

class DismissTerminalRefundRequest extends JsonSerializableType
{
    /**
     * @var string $terminalRefundId Unique ID for the `TerminalRefund` associated with the refund to be dismissed.
     */
    private string $terminalRefundId;

    /**
     * @param array{
     *   terminalRefundId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->terminalRefundId = $values['terminalRefundId'];
    }

    /**
     * @return string
     */
    public function getTerminalRefundId(): string
    {
        return $this->terminalRefundId;
    }

    /**
     * @param string $value
     */
    public function setTerminalRefundId(string $value): self
    {
        $this->terminalRefundId = $value;
        return $this;
    }
}
