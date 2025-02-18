<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents an input to a call to [UpdateVendor](api-endpoint:Vendors-UpdateVendor).
 */
class UpdateVendorRequest extends JsonSerializableType
{
    /**
     * A client-supplied, universally unique identifier (UUID) for the
     * request.
     *
     * See [Idempotency](https://developer.squareup.com/docs/build-basics/common-api-patterns/idempotency) in the
     * [API Development 101](https://developer.squareup.com/docs/buildbasics) section for more
     * information.
     *
     * @var ?string $idempotencyKey
     */
    #[JsonProperty('idempotency_key')]
    private ?string $idempotencyKey;

    /**
     * @var Vendor $vendor The specified [Vendor](entity:Vendor) to be updated.
     */
    #[JsonProperty('vendor')]
    private Vendor $vendor;

    /**
     * @param array{
     *   vendor: Vendor,
     *   idempotencyKey?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->idempotencyKey = $values['idempotencyKey'] ?? null;
        $this->vendor = $values['vendor'];
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
     * @return Vendor
     */
    public function getVendor(): Vendor
    {
        return $this->vendor;
    }

    /**
     * @param Vendor $value
     */
    public function setVendor(Vendor $value): self
    {
        $this->vendor = $value;
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
