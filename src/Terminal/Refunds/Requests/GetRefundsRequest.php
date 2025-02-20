<?php

namespace Square\Terminal\Refunds\Requests;

use Square\Core\Json\JsonSerializableType;

class GetRefundsRequest extends JsonSerializableType
{
    /**
     * @var string $terminalRefundId The unique ID for the desired `TerminalRefund`.
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
