<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class CreateOrderRequest extends JsonSerializableType
{
    /**
     * The order to create. If this field is set, the only other top-level field that can be
     * set is the `idempotency_key`.
     *
     * @var ?Order $order
     */
    #[JsonProperty('order')]
    private ?Order $order;

    /**
     * A value you specify that uniquely identifies this
     * order among orders you have created.
     *
     * If you are unsure whether a particular order was created successfully,
     * you can try it again with the same idempotency key without
     * worrying about creating duplicate orders.
     *
     * For more information, see [Idempotency](https://developer.squareup.com/docs/build-basics/common-api-patterns/idempotency).
     *
     * @var ?string $idempotencyKey
     */
    #[JsonProperty('idempotency_key')]
    private ?string $idempotencyKey;

    /**
     * @param array{
     *   order?: ?Order,
     *   idempotencyKey?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->order = $values['order'] ?? null;
        $this->idempotencyKey = $values['idempotencyKey'] ?? null;
    }

    /**
     * @return ?Order
     */
    public function getOrder(): ?Order
    {
        return $this->order;
    }

    /**
     * @param ?Order $value
     */
    public function setOrder(?Order $value = null): self
    {
        $this->order = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getIdempotencyKey(): ?string
    {
        return $this->idempotencyKey;
    }

    /**
     * @param ?string $value
     */
    public function setIdempotencyKey(?string $value = null): self
    {
        $this->idempotencyKey = $value;
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
