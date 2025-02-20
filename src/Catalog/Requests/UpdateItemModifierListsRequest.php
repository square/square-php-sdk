<?php

namespace Square\Catalog\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class UpdateItemModifierListsRequest extends JsonSerializableType
{
    /**
     * @var array<string> $itemIds The IDs of the catalog items associated with the CatalogModifierList objects being updated.
     */
    #[JsonProperty('item_ids'), ArrayType(['string'])]
    private array $itemIds;

    /**
     * The IDs of the CatalogModifierList objects to enable for the CatalogItem.
     * At least one of `modifier_lists_to_enable` or `modifier_lists_to_disable` must be specified.
     *
     * @var ?array<string> $modifierListsToEnable
     */
    #[JsonProperty('modifier_lists_to_enable'), ArrayType(['string'])]
    private ?array $modifierListsToEnable;

    /**
     * The IDs of the CatalogModifierList objects to disable for the CatalogItem.
     * At least one of `modifier_lists_to_enable` or `modifier_lists_to_disable` must be specified.
     *
     * @var ?array<string> $modifierListsToDisable
     */
    #[JsonProperty('modifier_lists_to_disable'), ArrayType(['string'])]
    private ?array $modifierListsToDisable;

    /**
     * @param array{
     *   itemIds: array<string>,
     *   modifierListsToEnable?: ?array<string>,
     *   modifierListsToDisable?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->itemIds = $values['itemIds'];
        $this->modifierListsToEnable = $values['modifierListsToEnable'] ?? null;
        $this->modifierListsToDisable = $values['modifierListsToDisable'] ?? null;
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
    public function getModifierListsToEnable(): ?array
    {
        return $this->modifierListsToEnable;
    }

    /**
     * @param ?array<string> $value
     */
    public function setModifierListsToEnable(?array $value = null): self
    {
        $this->modifierListsToEnable = $value;
        return $this;
    }

    /**
     * @return ?array<string>
     */
    public function getModifierListsToDisable(): ?array
    {
        return $this->modifierListsToDisable;
    }

    /**
     * @param ?array<string> $value
     */
    public function setModifierListsToDisable(?array $value = null): self
    {
        $this->modifierListsToDisable = $value;
        return $this;
    }
}
