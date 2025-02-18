<?php

namespace Square\Catalog\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class UpdateItemTaxesRequest extends JsonSerializableType
{
    /**
     * IDs for the CatalogItems associated with the CatalogTax objects being updated.
     * No more than 1,000 IDs may be provided.
     *
     * @var array<string> $itemIds
     */
    #[JsonProperty('item_ids'), ArrayType(['string'])]
    private array $itemIds;

    /**
     * IDs of the CatalogTax objects to enable.
     * At least one of `taxes_to_enable` or `taxes_to_disable` must be specified.
     *
     * @var ?array<string> $taxesToEnable
     */
    #[JsonProperty('taxes_to_enable'), ArrayType(['string'])]
    private ?array $taxesToEnable;

    /**
     * IDs of the CatalogTax objects to disable.
     * At least one of `taxes_to_enable` or `taxes_to_disable` must be specified.
     *
     * @var ?array<string> $taxesToDisable
     */
    #[JsonProperty('taxes_to_disable'), ArrayType(['string'])]
    private ?array $taxesToDisable;

    /**
     * @param array{
     *   itemIds: array<string>,
     *   taxesToEnable?: ?array<string>,
     *   taxesToDisable?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->itemIds = $values['itemIds'];
        $this->taxesToEnable = $values['taxesToEnable'] ?? null;
        $this->taxesToDisable = $values['taxesToDisable'] ?? null;
    }

    /**
     * @return array<string>
     */
    public function getItemIds(): array
    {
        return $this->itemIds;
    }

    /**
     * @param array<string> $value
     */
    public function setItemIds(array $value): self
    {
        $this->itemIds = $value;
        return $this;
    }

    /**
     * @return ?array<string>
     */
    public function getTaxesToEnable(): ?array
    {
        return $this->taxesToEnable;
    }

    /**
     * @param ?array<string> $value
     */
    public function setTaxesToEnable(?array $value = null): self
    {
        $this->taxesToEnable = $value;
        return $this;
    }

    /**
     * @return ?array<string>
     */
    public function getTaxesToDisable(): ?array
    {
        return $this->taxesToDisable;
    }

    /**
     * @param ?array<string> $value
     */
    public function setTaxesToDisable(?array $value = null): self
    {
        $this->taxesToDisable = $value;
        return $this;
    }
}
