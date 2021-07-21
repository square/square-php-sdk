<?php

declare(strict_types=1);

namespace Square\Models;

class CreateTerminalRefundRequest implements \JsonSerializable
{
    /**
     * @var string
     */
    private $idempotencyKey;

    /**
     * @var TerminalRefund|null
     */
    private $refund;

    /**
     * @param string $idempotencyKey
     */
    public function __construct(string $idempotencyKey)
    {
        $this->idempotencyKey = $idempotencyKey;
    }

    /**
     * Returns Idempotency Key.
     *
     * A unique string that identifies this `CreateRefund` request. Keys can be any valid string but
     * must be unique for every `CreateRefund` request.
     *
     * See [Idempotency keys](https://developer.squareup.com/docs/basics/api101/idempotency) for more
     * information.
     */
    public function getIdempotencyKey(): string
    {
        return $this->idempotencyKey;
    }

    /**
     * Sets Idempotency Key.
     *
     * A unique string that identifies this `CreateRefund` request. Keys can be any valid string but
     * must be unique for every `CreateRefund` request.
     *
     * See [Idempotency keys](https://developer.squareup.com/docs/basics/api101/idempotency) for more
     * information.
     *
     * @required
     * @maps idempotency_key
     */
    public function setIdempotencyKey(string $idempotencyKey): void
    {
        $this->idempotencyKey = $idempotencyKey;
    }

    /**
     * Returns Refund.
     */
    public function getRefund(): ?TerminalRefund
    {
        return $this->refund;
    }

    /**
     * Sets Refund.
     *
     * @maps refund
     */
    public function setRefund(?TerminalRefund $refund): void
    {
        $this->refund = $refund;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['idempotency_key'] = $this->idempotencyKey;
        if (isset($this->refund)) {
            $json['refund']      = $this->refund;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
