<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * The query filter to return the items containing the specified tax IDs.
 */
class CatalogQueryItemsForTax extends JsonSerializableType
{
    /**
     * @var array<string> $taxIds A set of `CatalogTax` IDs to be used to find associated `CatalogItem`s.
     */
    #[JsonProperty('tax_ids'), ArrayType(['string'])]
    private array $taxIds;

    /**
     * @param array{
     *   taxIds: array<string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->taxIds = $values['taxIds'];
    }

    /**
     * @return array<string>
     */
    public function getTaxIds(): array
    {
        return $this->taxIds;
    }

    /**
     * @param array<string> $value
     */
    public function setTaxIds(array $value): self
    {
        $this->taxIds = $value;
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
