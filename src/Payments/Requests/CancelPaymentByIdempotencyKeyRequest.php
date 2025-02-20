<?php

namespace Square\Payments\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class CancelPaymentByIdempotencyKeyRequest extends JsonSerializableType
{
    /**
     * @var string $idempotencyKey The `idempotency_key` identifying the payment to be canceled.
     */
    #[JsonProperty('idempotency_key')]
    private string $idempotencyKey;

    /**
     * @param array{
     *   idempotencyKey: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->idempotencyKey = $values['idempotencyKey'];
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
}
