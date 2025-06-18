<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class VendorUpdatedEventObject extends JsonSerializableType
{
    /**
     * The operation on the vendor that caused the event to be published. The value is `UPDATED`.
     * See [Operation](#type-operation) for possible values
     *
     * @var ?'UPDATED' $operation
     */
    #[JsonProperty('operation')]
    private ?string $operation;

    /**
     * @var ?Vendor $vendor The updated vendor as the result of the specified operation.
     */
    #[JsonProperty('vendor')]
    private ?Vendor $vendor;

    /**
     * @param array{
     *   operation?: ?'UPDATED',
     *   vendor?: ?Vendor,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->operation = $values['operation'] ?? null;
        $this->vendor = $values['vendor'] ?? null;
    }

    /**
     * @return ?'UPDATED'
     */
    public function getOperation(): ?string
    {
        return $this->operation;
    }

    /**
     * @param ?'UPDATED' $value
     */
    public function setOperation(?string $value = null): self
    {
        $this->operation = $value;
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

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
