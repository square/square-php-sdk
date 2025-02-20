<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Defines supported query expressions to search for vendors by.
 */
class SearchVendorsRequestFilter extends JsonSerializableType
{
    /**
     * @var ?array<string> $name The names of the [Vendor](entity:Vendor) objects to retrieve.
     */
    #[JsonProperty('name'), ArrayType(['string'])]
    private ?array $name;

    /**
     * The statuses of the [Vendor](entity:Vendor) objects to retrieve.
     * See [VendorStatus](#type-vendorstatus) for possible values
     *
     * @var ?array<value-of<VendorStatus>> $status
     */
    #[JsonProperty('status'), ArrayType(['string'])]
    private ?array $status;

    /**
     * @param array{
     *   name?: ?array<string>,
     *   status?: ?array<value-of<VendorStatus>>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->name = $values['name'] ?? null;
        $this->status = $values['status'] ?? null;
    }

    /**
     * @return ?array<string>
     */
    public function getName(): ?array
    {
        return $this->name;
    }

    /**
     * @param ?array<string> $value
     */
    public function setName(?array $value = null): self
    {
        $this->name = $value;
        return $this;
    }

    /**
     * @return ?array<value-of<VendorStatus>>
     */
    public function getStatus(): ?array
    {
        return $this->status;
    }

    /**
     * @param ?array<value-of<VendorStatus>> $value
     */
    public function setStatus(?array $value = null): self
    {
        $this->status = $value;
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
