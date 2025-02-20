<?php

namespace Square\Terminal\Refunds\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Types\TerminalRefund;

class CreateTerminalRefundRequest extends JsonSerializableType
{
    /**
     * A unique string that identifies this `CreateRefund` request. Keys can be any valid string but
     * must be unique for every `CreateRefund` request.
     *
     * See [Idempotency keys](https://developer.squareup.com/docs/build-basics/common-api-patterns/idempotency) for more information.
     *
     * @var string $idempotencyKey
     */
    #[JsonProperty('idempotency_key')]
    private string $idempotencyKey;

    /**
     * @var ?TerminalRefund $refund The refund to create.
     */
    #[JsonProperty('refund')]
    private ?TerminalRefund $refund;

    /**
     * @param array{
     *   idempotencyKey: string,
     *   refund?: ?TerminalRefund,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->idempotencyKey = $values['idempotencyKey'];
        $this->refund = $values['refund'] ?? null;
    }

    /**
     * @return string
     */
    public function getIdempotencyKey(): string
    {
        return $this->idempotencyKey;
    }

    /**
     * @param string $value
     */
    public function setIdempotencyKey(string $value): self
    {
        $this->idempotencyKey = $value;
        return $this;
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
}
