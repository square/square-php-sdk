<?php

namespace Square\Vendors\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\UpdateVendorRequest;

class UpdateVendorsRequest extends JsonSerializableType
{
    /**
     * @var string $vendorId ID of the [Vendor](entity:Vendor) to retrieve.
     */
    private string $vendorId;

    /**
     * @var UpdateVendorRequest $body
     */
    private UpdateVendorRequest $body;

    /**
     * @param array{
     *   vendorId: string,
     *   body: UpdateVendorRequest,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->vendorId = $values['vendorId'];
        $this->body = $values['body'];
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

    /**
     * @return UpdateVendorRequest
     */
    public function getBody(): UpdateVendorRequest
    {
        return $this->body;
    }

    /**
     * @param UpdateVendorRequest $value
     */
    public function setBody(UpdateVendorRequest $value): self
    {
        $this->body = $value;
        return $this;
    }
}
