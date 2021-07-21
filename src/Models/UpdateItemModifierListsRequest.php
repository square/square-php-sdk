<?php

declare(strict_types=1);

namespace Square\Models;

class UpdateItemModifierListsRequest implements \JsonSerializable
{
    /**
     * @var string[]
     */
    private $itemIds;

    /**
     * @var string[]|null
     */
    private $modifierListsToEnable;

    /**
     * @var string[]|null
     */
    private $modifierListsToDisable;

    /**
     * @param string[] $itemIds
     */
    public function __construct(array $itemIds)
    {
        $this->itemIds = $itemIds;
    }

    /**
     * Returns Item Ids.
     *
     * The IDs of the catalog items associated with the CatalogModifierList objects being updated.
     *
     * @return string[]
     */
    public function getItemIds(): array
    {
        return $this->itemIds;
    }

    /**
     * Sets Item Ids.
     *
     * The IDs of the catalog items associated with the CatalogModifierList objects being updated.
     *
     * @required
     * @maps item_ids
     *
     * @param string[] $itemIds
     */
    public function setItemIds(array $itemIds): void
    {
        $this->itemIds = $itemIds;
    }

    /**
     * Returns Modifier Lists to Enable.
     *
     * The IDs of the CatalogModifierList objects to enable for the CatalogItem.
     *
     * @return string[]|null
     */
    public function getModifierListsToEnable(): ?array
    {
        return $this->modifierListsToEnable;
    }

    /**
     * Sets Modifier Lists to Enable.
     *
     * The IDs of the CatalogModifierList objects to enable for the CatalogItem.
     *
     * @maps modifier_lists_to_enable
     *
     * @param string[]|null $modifierListsToEnable
     */
    public function setModifierListsToEnable(?array $modifierListsToEnable): void
    {
        $this->modifierListsToEnable = $modifierListsToEnable;
    }

    /**
     * Returns Modifier Lists to Disable.
     *
     * The IDs of the CatalogModifierList objects to disable for the CatalogItem.
     *
     * @return string[]|null
     */
    public function getModifierListsToDisable(): ?array
    {
        return $this->modifierListsToDisable;
    }

    /**
     * Sets Modifier Lists to Disable.
     *
     * The IDs of the CatalogModifierList objects to disable for the CatalogItem.
     *
     * @maps modifier_lists_to_disable
     *
     * @param string[]|null $modifierListsToDisable
     */
    public function setModifierListsToDisable(?array $modifierListsToDisable): void
    {
        $this->modifierListsToDisable = $modifierListsToDisable;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['item_ids']                      = $this->itemIds;
        if (isset($this->modifierListsToEnable)) {
            $json['modifier_lists_to_enable']  = $this->modifierListsToEnable;
        }
        if (isset($this->modifierListsToDisable)) {
            $json['modifier_lists_to_disable'] = $this->modifierListsToDisable;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
