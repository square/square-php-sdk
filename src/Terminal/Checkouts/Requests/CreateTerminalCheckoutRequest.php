<?php

namespace Square\Terminal\Checkouts\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Types\TerminalCheckout;

class CreateTerminalCheckoutRequest extends JsonSerializableType
{
    /**
     * A unique string that identifies this `CreateCheckout` request. Keys can be any valid string but
     * must be unique for every `CreateCheckout` request.
     *
     * See [Idempotency keys](https://developer.squareup.com/docs/build-basics/common-api-patterns/idempotency) for more information.
     *
     * @var string $idempotencyKey
     */
    #[JsonProperty('idempotency_key')]
    private string $idempotencyKey;

    /**
     * @var TerminalCheckout $checkout The checkout to create.
     */
    #[JsonProperty('checkout')]
    private TerminalCheckout $checkout;

    /**
     * @param array{
     *   idempotencyKey: string,
     *   checkout: TerminalCheckout,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->idempotencyKey = $values['idempotencyKey'];
        $this->checkout = $values['checkout'];
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
     * @return TerminalCheckout
     */
    public function getCheckout(): TerminalCheckout
    {
        return $this->checkout;
    }

    /**
     * @param TerminalCheckout $value
     */
    public function setCheckout(TerminalCheckout $value): self
    {
        $this->checkout = $value;
        return $this;
    }
}
