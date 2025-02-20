<?php

namespace Square\Vendors\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class BatchGetVendorsRequest extends JsonSerializableType
{
    /**
     * @var ?array<string> $vendorIds IDs of the [Vendor](entity:Vendor) objects to retrieve.
     */
    #[JsonProperty('vendor_ids'), ArrayType(['string'])]
    private ?array $vendorIds;

    /**
     * @param array{
     *   vendorIds?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->vendorIds = $values['vendorIds'] ?? null;
    }

    /**
     * @return ?array<string>
     */
    public function getVendorIds(): ?array
    {
        return $this->vendorIds;
    }

    /**
     * @param ?array<string> $value
     */
    public function setVendorIds(?array $value = null): self
    {
        $this->vendorIds = $value;
        return $this;
    }
}
