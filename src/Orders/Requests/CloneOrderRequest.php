<?php

namespace Square\Orders\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class CloneOrderRequest extends JsonSerializableType
{
    /**
     * @var string $orderId The ID of the order to clone.
     */
    #[JsonProperty('order_id')]
    private string $orderId;

    /**
     * An optional order version for concurrency protection.
     *
     * If a version is provided, it must match the latest stored version of the order to clone.
     * If a version is not provided, the API clones the latest version.
     *
     * @var ?int $version
     */
    #[JsonProperty('version')]
    private ?int $version;

    /**
     * A value you specify that uniquely identifies this clone request.
     *
     * If you are unsure whether a particular order was cloned successfully,
     * you can reattempt the call with the same idempotency key without
     * worrying about creating duplicate cloned orders.
     * The originally cloned order is returned.
     *
     * For more information, see [Idempotency](https://developer.squareup.com/docs/build-basics/common-api-patterns/idempotency).
     *
     * @var ?string $idempotencyKey
     */
    #[JsonProperty('idempotency_key')]
    private ?string $idempotencyKey;

    /**
     * @param array{
     *   orderId: string,
     *   version?: ?int,
     *   idempotencyKey?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->orderId = $values['orderId'];
        $this->version = $values['version'] ?? null;
        $this->idempotencyKey = $values['idempotencyKey'] ?? null;
    }

    /**
     * @return string
     */
    public function getOrderId(): string
    {
        return $this->orderId;
    }

    /**
     * @param string $value
     */
    public function setOrderId(string $value): self
    {
        $this->orderId = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getVersion(): ?int
    {
        return $this->version;
    }

    /**
     * @param ?int $value
     */
    public function setVersion(?int $value = null): self
    {
        $this->version = $value;
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
}
