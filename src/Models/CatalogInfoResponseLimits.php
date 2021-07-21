<?php

declare(strict_types=1);

namespace Square\Models;

class CatalogInfoResponseLimits implements \JsonSerializable
{
    /**
     * @var int|null
     */
    private $batchUpsertMaxObjectsPerBatch;

    /**
     * @var int|null
     */
    private $batchUpsertMaxTotalObjects;

    /**
     * @var int|null
     */
    private $batchRetrieveMaxObjectIds;

    /**
     * @var int|null
     */
    private $searchMaxPageLimit;

    /**
     * @var int|null
     */
    private $batchDeleteMaxObjectIds;

    /**
     * @var int|null
     */
    private $updateItemTaxesMaxItemIds;

    /**
     * @var int|null
     */
    private $updateItemTaxesMaxTaxesToEnable;

    /**
     * @var int|null
     */
    private $updateItemTaxesMaxTaxesToDisable;

    /**
     * @var int|null
     */
    private $updateItemModifierListsMaxItemIds;

    /**
     * @var int|null
     */
    private $updateItemModifierListsMaxModifierListsToEnable;

    /**
     * @var int|null
     */
    private $updateItemModifierListsMaxModifierListsToDisable;

    /**
     * Returns Batch Upsert Max Objects Per Batch.
     *
     * The maximum number of objects that may appear within a single batch in a
     * `/v2/catalog/batch-upsert` request.
     */
    public function getBatchUpsertMaxObjectsPerBatch(): ?int
    {
        return $this->batchUpsertMaxObjectsPerBatch;
    }

    /**
     * Sets Batch Upsert Max Objects Per Batch.
     *
     * The maximum number of objects that may appear within a single batch in a
     * `/v2/catalog/batch-upsert` request.
     *
     * @maps batch_upsert_max_objects_per_batch
     */
    public function setBatchUpsertMaxObjectsPerBatch(?int $batchUpsertMaxObjectsPerBatch): void
    {
        $this->batchUpsertMaxObjectsPerBatch = $batchUpsertMaxObjectsPerBatch;
    }

    /**
     * Returns Batch Upsert Max Total Objects.
     *
     * The maximum number of objects that may appear across all batches in a
     * `/v2/catalog/batch-upsert` request.
     */
    public function getBatchUpsertMaxTotalObjects(): ?int
    {
        return $this->batchUpsertMaxTotalObjects;
    }

    /**
     * Sets Batch Upsert Max Total Objects.
     *
     * The maximum number of objects that may appear across all batches in a
     * `/v2/catalog/batch-upsert` request.
     *
     * @maps batch_upsert_max_total_objects
     */
    public function setBatchUpsertMaxTotalObjects(?int $batchUpsertMaxTotalObjects): void
    {
        $this->batchUpsertMaxTotalObjects = $batchUpsertMaxTotalObjects;
    }

    /**
     * Returns Batch Retrieve Max Object Ids.
     *
     * The maximum number of object IDs that may appear in a `/v2/catalog/batch-retrieve`
     * request.
     */
    public function getBatchRetrieveMaxObjectIds(): ?int
    {
        return $this->batchRetrieveMaxObjectIds;
    }

    /**
     * Sets Batch Retrieve Max Object Ids.
     *
     * The maximum number of object IDs that may appear in a `/v2/catalog/batch-retrieve`
     * request.
     *
     * @maps batch_retrieve_max_object_ids
     */
    public function setBatchRetrieveMaxObjectIds(?int $batchRetrieveMaxObjectIds): void
    {
        $this->batchRetrieveMaxObjectIds = $batchRetrieveMaxObjectIds;
    }

    /**
     * Returns Search Max Page Limit.
     *
     * The maximum number of results that may be returned in a page of a
     * `/v2/catalog/search` response.
     */
    public function getSearchMaxPageLimit(): ?int
    {
        return $this->searchMaxPageLimit;
    }

    /**
     * Sets Search Max Page Limit.
     *
     * The maximum number of results that may be returned in a page of a
     * `/v2/catalog/search` response.
     *
     * @maps search_max_page_limit
     */
    public function setSearchMaxPageLimit(?int $searchMaxPageLimit): void
    {
        $this->searchMaxPageLimit = $searchMaxPageLimit;
    }

    /**
     * Returns Batch Delete Max Object Ids.
     *
     * The maximum number of object IDs that may be included in a single
     * `/v2/catalog/batch-delete` request.
     */
    public function getBatchDeleteMaxObjectIds(): ?int
    {
        return $this->batchDeleteMaxObjectIds;
    }

    /**
     * Sets Batch Delete Max Object Ids.
     *
     * The maximum number of object IDs that may be included in a single
     * `/v2/catalog/batch-delete` request.
     *
     * @maps batch_delete_max_object_ids
     */
    public function setBatchDeleteMaxObjectIds(?int $batchDeleteMaxObjectIds): void
    {
        $this->batchDeleteMaxObjectIds = $batchDeleteMaxObjectIds;
    }

    /**
     * Returns Update Item Taxes Max Item Ids.
     *
     * The maximum number of item IDs that may be included in a single
     * `/v2/catalog/update-item-taxes` request.
     */
    public function getUpdateItemTaxesMaxItemIds(): ?int
    {
        return $this->updateItemTaxesMaxItemIds;
    }

    /**
     * Sets Update Item Taxes Max Item Ids.
     *
     * The maximum number of item IDs that may be included in a single
     * `/v2/catalog/update-item-taxes` request.
     *
     * @maps update_item_taxes_max_item_ids
     */
    public function setUpdateItemTaxesMaxItemIds(?int $updateItemTaxesMaxItemIds): void
    {
        $this->updateItemTaxesMaxItemIds = $updateItemTaxesMaxItemIds;
    }

    /**
     * Returns Update Item Taxes Max Taxes to Enable.
     *
     * The maximum number of tax IDs to be enabled that may be included in a single
     * `/v2/catalog/update-item-taxes` request.
     */
    public function getUpdateItemTaxesMaxTaxesToEnable(): ?int
    {
        return $this->updateItemTaxesMaxTaxesToEnable;
    }

    /**
     * Sets Update Item Taxes Max Taxes to Enable.
     *
     * The maximum number of tax IDs to be enabled that may be included in a single
     * `/v2/catalog/update-item-taxes` request.
     *
     * @maps update_item_taxes_max_taxes_to_enable
     */
    public function setUpdateItemTaxesMaxTaxesToEnable(?int $updateItemTaxesMaxTaxesToEnable): void
    {
        $this->updateItemTaxesMaxTaxesToEnable = $updateItemTaxesMaxTaxesToEnable;
    }

    /**
     * Returns Update Item Taxes Max Taxes to Disable.
     *
     * The maximum number of tax IDs to be disabled that may be included in a single
     * `/v2/catalog/update-item-taxes` request.
     */
    public function getUpdateItemTaxesMaxTaxesToDisable(): ?int
    {
        return $this->updateItemTaxesMaxTaxesToDisable;
    }

    /**
     * Sets Update Item Taxes Max Taxes to Disable.
     *
     * The maximum number of tax IDs to be disabled that may be included in a single
     * `/v2/catalog/update-item-taxes` request.
     *
     * @maps update_item_taxes_max_taxes_to_disable
     */
    public function setUpdateItemTaxesMaxTaxesToDisable(?int $updateItemTaxesMaxTaxesToDisable): void
    {
        $this->updateItemTaxesMaxTaxesToDisable = $updateItemTaxesMaxTaxesToDisable;
    }

    /**
     * Returns Update Item Modifier Lists Max Item Ids.
     *
     * The maximum number of item IDs that may be included in a single
     * `/v2/catalog/update-item-modifier-lists` request.
     */
    public function getUpdateItemModifierListsMaxItemIds(): ?int
    {
        return $this->updateItemModifierListsMaxItemIds;
    }

    /**
     * Sets Update Item Modifier Lists Max Item Ids.
     *
     * The maximum number of item IDs that may be included in a single
     * `/v2/catalog/update-item-modifier-lists` request.
     *
     * @maps update_item_modifier_lists_max_item_ids
     */
    public function setUpdateItemModifierListsMaxItemIds(?int $updateItemModifierListsMaxItemIds): void
    {
        $this->updateItemModifierListsMaxItemIds = $updateItemModifierListsMaxItemIds;
    }

    /**
     * Returns Update Item Modifier Lists Max Modifier Lists to Enable.
     *
     * The maximum number of modifier list IDs to be enabled that may be included in
     * a single `/v2/catalog/update-item-modifier-lists` request.
     */
    public function getUpdateItemModifierListsMaxModifierListsToEnable(): ?int
    {
        return $this->updateItemModifierListsMaxModifierListsToEnable;
    }

    /**
     * Sets Update Item Modifier Lists Max Modifier Lists to Enable.
     *
     * The maximum number of modifier list IDs to be enabled that may be included in
     * a single `/v2/catalog/update-item-modifier-lists` request.
     *
     * @maps update_item_modifier_lists_max_modifier_lists_to_enable
     */
    public function setUpdateItemModifierListsMaxModifierListsToEnable(
        ?int $updateItemModifierListsMaxModifierListsToEnable
    ): void {
        $this->updateItemModifierListsMaxModifierListsToEnable = $updateItemModifierListsMaxModifierListsToEnable;
    }

    /**
     * Returns Update Item Modifier Lists Max Modifier Lists to Disable.
     *
     * The maximum number of modifier list IDs to be disabled that may be included in
     * a single `/v2/catalog/update-item-modifier-lists` request.
     */
    public function getUpdateItemModifierListsMaxModifierListsToDisable(): ?int
    {
        return $this->updateItemModifierListsMaxModifierListsToDisable;
    }

    /**
     * Sets Update Item Modifier Lists Max Modifier Lists to Disable.
     *
     * The maximum number of modifier list IDs to be disabled that may be included in
     * a single `/v2/catalog/update-item-modifier-lists` request.
     *
     * @maps update_item_modifier_lists_max_modifier_lists_to_disable
     */
    public function setUpdateItemModifierListsMaxModifierListsToDisable(
        ?int $updateItemModifierListsMaxModifierListsToDisable
    ): void {
        $this->updateItemModifierListsMaxModifierListsToDisable = $updateItemModifierListsMaxModifierListsToDisable;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->batchUpsertMaxObjectsPerBatch)) {
            $json['batch_upsert_max_objects_per_batch']                       = $this->batchUpsertMaxObjectsPerBatch;
        }
        if (isset($this->batchUpsertMaxTotalObjects)) {
            $json['batch_upsert_max_total_objects']                           = $this->batchUpsertMaxTotalObjects;
        }
        if (isset($this->batchRetrieveMaxObjectIds)) {
            $json['batch_retrieve_max_object_ids']                            = $this->batchRetrieveMaxObjectIds;
        }
        if (isset($this->searchMaxPageLimit)) {
            $json['search_max_page_limit']                                    = $this->searchMaxPageLimit;
        }
        if (isset($this->batchDeleteMaxObjectIds)) {
            $json['batch_delete_max_object_ids']                              = $this->batchDeleteMaxObjectIds;
        }
        if (isset($this->updateItemTaxesMaxItemIds)) {
            $json['update_item_taxes_max_item_ids']                           = $this->updateItemTaxesMaxItemIds;
        }
        if (isset($this->updateItemTaxesMaxTaxesToEnable)) {
            $json['update_item_taxes_max_taxes_to_enable']                    = $this->updateItemTaxesMaxTaxesToEnable;
        }
        if (isset($this->updateItemTaxesMaxTaxesToDisable)) {
            $json['update_item_taxes_max_taxes_to_disable']                   = $this->updateItemTaxesMaxTaxesToDisable;
        }
        if (isset($this->updateItemModifierListsMaxItemIds)) {
            $json['update_item_modifier_lists_max_item_ids']                  =
            $this->updateItemModifierListsMaxItemIds;
        }
        if (isset($this->updateItemModifierListsMaxModifierListsToEnable)) {
            $json['update_item_modifier_lists_max_modifier_lists_to_enable']  =
            $this->updateItemModifierListsMaxModifierListsToEnable;
        }
        if (isset($this->updateItemModifierListsMaxModifierListsToDisable)) {
            $json['update_item_modifier_lists_max_modifier_lists_to_disable'] =
            $this->updateItemModifierListsMaxModifierListsToDisable;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
