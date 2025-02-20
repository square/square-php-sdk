<?php

namespace Square\Vendors\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\UpdateVendorRequest;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class BatchUpdateVendorsRequest extends JsonSerializableType
{
    /**
     * A set of [UpdateVendorRequest](entity:UpdateVendorRequest) objects encapsulating to-be-updated [Vendor](entity:Vendor)
     * objects. The set is represented by  a collection of `Vendor`-ID/`UpdateVendorRequest`-object pairs.
     *
     * @var array<string, UpdateVendorRequest> $vendors
     */
    #[JsonProperty('vendors'), ArrayType(['string' => UpdateVendorRequest::class])]
    private array $vendors;

    /**
     * @param array{
     *   vendors: array<string, UpdateVendorRequest>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->vendors = $values['vendors'];
    }

    /**
     * @return array<string, UpdateVendorRequest>
     */
    public function getVendors(): array
    {
        return $this->vendors;
    }

    /**
     * @param array<string, UpdateVendorRequest> $value
     */
    public function setVendors(array $value): self
    {
        $this->vendors = $value;
        return $this;
    }
}
