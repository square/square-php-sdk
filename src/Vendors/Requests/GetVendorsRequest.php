<?php

namespace Square\Vendors\Requests;

use Square\Core\Json\JsonSerializableType;

class GetVendorsRequest extends JsonSerializableType
{
    /**
     * @var string $vendorId ID of the [Vendor](entity:Vendor) to retrieve.
     */
    private string $vendorId;

    /**
     * @param array{
     *   vendorId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->vendorId = $values['vendorId'];
    }

    /**
     * @return string
     */
    public function getVendorId(): string
    {
        return $this->vendorId;
    }

    /**
     * @param string $value
     */
    public function setVendorId(string $value): self
    {
        $this->vendorId = $value;
        return $this;
    }
}
