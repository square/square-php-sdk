<?php

namespace Square\Vendors\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\Vendor;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class BatchCreateVendorsRequest extends JsonSerializableType
{
    /**
     * @var array<string, Vendor> $vendors Specifies a set of new [Vendor](entity:Vendor) objects as represented by a collection of idempotency-key/`Vendor`-object pairs.
     */
    #[JsonProperty('vendors'), ArrayType(['string' => Vendor::class])]
    private array $vendors;

    /**
     * @param array{
     *   vendors: array<string, Vendor>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->vendors = $values['vendors'];
    }

    /**
     * @return array<string, Vendor>
     */
    public function getVendors(): array
    {
        return $this->vendors;
    }

    /**
     * @param array<string, Vendor> $value
     */
    public function setVendors(array $value): self
    {
        $this->vendors = $value;
        return $this;
    }
}
