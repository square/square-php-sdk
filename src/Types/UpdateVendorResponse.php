<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Represents an output from a call to [UpdateVendor](api-endpoint:Vendors-UpdateVendor).
 */
class UpdateVendorResponse extends JsonSerializableType
{
    /**
     * @var ?array<Error> $errors Errors occurred when the request fails.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @var ?Vendor $vendor The [Vendor](entity:Vendor) that has been updated.
     */
    #[JsonProperty('vendor')]
    private ?Vendor $vendor;

    /**
     * @param array{
     *   errors?: ?array<Error>,
     *   vendor?: ?Vendor,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->errors = $values['errors'] ?? null;
        $this->vendor = $values['vendor'] ?? null;
    }

    /**
     * @return ?array<Error>
     */
    public function getErrors(): ?array
    {
        return $this->errors;
    }

    /**
     * @param ?array<Error> $value
     */
    public function setErrors(?array $value = null): self
    {
        $this->errors = $value;
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
