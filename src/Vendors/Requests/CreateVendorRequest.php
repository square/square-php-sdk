<?php

namespace Square\Vendors\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Types\Vendor;

class CreateVendorRequest extends JsonSerializableType
{
    /**
     * A client-supplied, universally unique identifier (UUID) to make this [CreateVendor](api-endpoint:Vendors-CreateVendor) call idempotent.
     *
     * See [Idempotency](https://developer.squareup.com/docs/build-basics/common-api-patterns/idempotency) in the
     * [API Development 101](https://developer.squareup.com/docs/buildbasics) section for more
     * information.
     *
     * @var string $idempotencyKey
     */
    #[JsonProperty('idempotency_key')]
    private string $idempotencyKey;

    /**
     * @var ?Vendor $vendor The requested [Vendor](entity:Vendor) to be created.
     */
    #[JsonProperty('vendor')]
    private ?Vendor $vendor;

    /**
     * @param array{
     *   idempotencyKey: string,
     *   vendor?: ?Vendor,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->idempotencyKey = $values['idempotencyKey'];
        $this->vendor = $values['vendor'] ?? null;
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
     * @return ?Vendor
     */
    public function getVendor(): ?Vendor
    {
        return $this->vendor;
    }

    /**
     * @param ?Vendor $value
     */
    public function setVendor(?Vendor $value = null): self
    {
        $this->vendor = $value;
        return $this;
    }
}
