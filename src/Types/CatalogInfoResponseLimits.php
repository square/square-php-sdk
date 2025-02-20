<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class CatalogInfoResponseLimits extends JsonSerializableType
{
    /**
     * The maximum number of objects that may appear within a single batch in a
     * `/v2/catalog/batch-upsert` request.
     *
     * @var ?int $batchUpsertMaxObjectsPerBatch
     */
    #[JsonProperty('batch_upsert_max_objects_per_batch')]
    private ?int $batchUpsertMaxObjectsPerBatch;

    /**
     * The maximum number of objects that may appear across all batches in a
     * `/v2/catalog/batch-upsert` request.
     *
     * @var ?int $batchUpsertMaxTotalObjects
     */
    #[JsonProperty('batch_upsert_max_total_objects')]
    private ?int $batchUpsertMaxTotalObjects;

    /**
     * The maximum number of object IDs that may appear in a `/v2/catalog/batch-retrieve`
     * request.
     *
     * @var ?int $batchRetrieveMaxObjectIds
     */
    #[JsonProperty('batch_retrieve_max_object_ids')]
    private ?int $batchRetrieveMaxObjectIds;

    /**
     * The maximum number of results that may be returned in a page of a
     * `/v2/catalog/search` response.
     *
     * @var ?int $searchMaxPageLimit
     */
    #[JsonProperty('search_max_page_limit')]
    private ?int $searchMaxPageLimit;

    /**
     * The maximum number of object IDs that may be included in a single
     * `/v2/catalog/batch-delete` request.
     *
     * @var ?int $batchDeleteMaxObjectIds
     */
    #[JsonProperty('batch_delete_max_object_ids')]
    private ?int $batchDeleteMaxObjectIds;

    /**
     * The maximum number of item IDs that may be included in a single
     * `/v2/catalog/update-item-taxes` request.
     *
     * @var ?int $updateItemTaxesMaxItemIds
     */
    #[JsonProperty('update_item_taxes_max_item_ids')]
    private ?int $updateItemTaxesMaxItemIds;

    /**
     * The maximum number of tax IDs to be enabled that may be included in a single
     * `/v2/catalog/update-item-taxes` request.
     *
     * @var ?int $updateItemTaxesMaxTaxesToEnable
     */
    #[JsonProperty('update_item_taxes_max_taxes_to_enable')]
    private ?int $updateItemTaxesMaxTaxesToEnable;

    /**
     * The maximum number of tax IDs to be disabled that may be included in a single
     * `/v2/catalog/update-item-taxes` request.
     *
     * @var ?int $updateItemTaxesMaxTaxesToDisable
     */
    #[JsonProperty('update_item_taxes_max_taxes_to_disable')]
    private ?int $updateItemTaxesMaxTaxesToDisable;

    /**
     * The maximum number of item IDs that may be included in a single
     * `/v2/catalog/update-item-modifier-lists` request.
     *
     * @var ?int $updateItemModifierListsMaxItemIds
     */
    #[JsonProperty('update_item_modifier_lists_max_item_ids')]
    private ?int $updateItemModifierListsMaxItemIds;

    /**
     * The maximum number of modifier list IDs to be enabled that may be included in
     * a single `/v2/catalog/update-item-modifier-lists` request.
     *
     * @var ?int $updateItemModifierListsMaxModifierListsToEnable
     */
    #[JsonProperty('update_item_modifier_lists_max_modifier_lists_to_enable')]
    private ?int $updateItemModifierListsMaxModifierListsToEnable;

    /**
     * The maximum number of modifier list IDs to be disabled that may be included in
     * a single `/v2/catalog/update-item-modifier-lists` request.
     *
     * @var ?int $updateItemModifierListsMaxModifierListsToDisable
     */
    #[JsonProperty('update_item_modifier_lists_max_modifier_lists_to_disable')]
    private ?int $updateItemModifierListsMaxModifierListsToDisable;

    /**
     * @param array{
     *   batchUpsertMaxObjectsPerBatch?: ?int,
     *   batchUpsertMaxTotalObjects?: ?int,
     *   batchRetrieveMaxObjectIds?: ?int,
     *   searchMaxPageLimit?: ?int,
     *   batchDeleteMaxObjectIds?: ?int,
     *   updateItemTaxesMaxItemIds?: ?int,
     *   updateItemTaxesMaxTaxesToEnable?: ?int,
     *   updateItemTaxesMaxTaxesToDisable?: ?int,
     *   updateItemModifierListsMaxItemIds?: ?int,
     *   updateItemModifierListsMaxModifierListsToEnable?: ?int,
     *   updateItemModifierListsMaxModifierListsToDisable?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->batchUpsertMaxObjectsPerBatch = $values['batchUpsertMaxObjectsPerBatch'] ?? null;
        $this->batchUpsertMaxTotalObjects = $values['batchUpsertMaxTotalObjects'] ?? null;
        $this->batchRetrieveMaxObjectIds = $values['batchRetrieveMaxObjectIds'] ?? null;
        $this->searchMaxPageLimit = $values['searchMaxPageLimit'] ?? null;
        $this->batchDeleteMaxObjectIds = $values['batchDeleteMaxObjectIds'] ?? null;
        $this->updateItemTaxesMaxItemIds = $values['updateItemTaxesMaxItemIds'] ?? null;
        $this->updateItemTaxesMaxTaxesToEnable = $values['updateItemTaxesMaxTaxesToEnable'] ?? null;
        $this->updateItemTaxesMaxTaxesToDisable = $values['updateItemTaxesMaxTaxesToDisable'] ?? null;
        $this->updateItemModifierListsMaxItemIds = $values['updateItemModifierListsMaxItemIds'] ?? null;
        $this->updateItemModifierListsMaxModifierListsToEnable = $values['updateItemModifierListsMaxModifierListsToEnable'] ?? null;
        $this->updateItemModifierListsMaxModifierListsToDisable = $values['updateItemModifierListsMaxModifierListsToDisable'] ?? null;
    }

    /**
     * @return ?int
     */
    public function getBatchUpsertMaxObjectsPerBatch(): ?int
    {
        return $this->batchUpsertMaxObjectsPerBatch;
    }

    /**
     * @param ?int $value
     */
    public function setBatchUpsertMaxObjectsPerBatch(?int $value = null): self
    {
        $this->batchUpsertMaxObjectsPerBatch = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getBatchUpsertMaxTotalObjects(): ?int
    {
        return $this->batchUpsertMaxTotalObjects;
    }

    /**
     * @param ?int $value
     */
    public function setBatchUpsertMaxTotalObjects(?int $value = null): self
    {
        $this->batchUpsertMaxTotalObjects = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getBatchRetrieveMaxObjectIds(): ?int
    {
        return $this->batchRetrieveMaxObjectIds;
    }

    /**
     * @param ?int $value
     */
    public function setBatchRetrieveMaxObjectIds(?int $value = null): self
    {
        $this->batchRetrieveMaxObjectIds = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getSearchMaxPageLimit(): ?int
    {
        return $this->searchMaxPageLimit;
    }

    /**
     * @param ?int $value
     */
    public function setSearchMaxPageLimit(?int $value = null): self
    {
        $this->searchMaxPageLimit = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getBatchDeleteMaxObjectIds(): ?int
    {
        return $this->batchDeleteMaxObjectIds;
    }

    /**
     * @param ?int $value
     */
    public function setBatchDeleteMaxObjectIds(?int $value = null): self
    {
        $this->batchDeleteMaxObjectIds = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getUpdateItemTaxesMaxItemIds(): ?int
    {
        return $this->updateItemTaxesMaxItemIds;
    }

    /**
     * @param ?int $value
     */
    public function setUpdateItemTaxesMaxItemIds(?int $value = null): self
    {
        $this->updateItemTaxesMaxItemIds = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getUpdateItemTaxesMaxTaxesToEnable(): ?int
    {
        return $this->updateItemTaxesMaxTaxesToEnable;
    }

    /**
     * @param ?int $value
     */
    public function setUpdateItemTaxesMaxTaxesToEnable(?int $value = null): self
    {
        $this->updateItemTaxesMaxTaxesToEnable = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getUpdateItemTaxesMaxTaxesToDisable(): ?int
    {
        return $this->updateItemTaxesMaxTaxesToDisable;
    }

    /**
     * @param ?int $value
     */
    public function setUpdateItemTaxesMaxTaxesToDisable(?int $value = null): self
    {
        $this->updateItemTaxesMaxTaxesToDisable = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getUpdateItemModifierListsMaxItemIds(): ?int
    {
        return $this->updateItemModifierListsMaxItemIds;
    }

    /**
     * @param ?int $value
     */
    public function setUpdateItemModifierListsMaxItemIds(?int $value = null): self
    {
        $this->updateItemModifierListsMaxItemIds = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getUpdateItemModifierListsMaxModifierListsToEnable(): ?int
    {
        return $this->updateItemModifierListsMaxModifierListsToEnable;
    }

    /**
     * @param ?int $value
     */
    public function setUpdateItemModifierListsMaxModifierListsToEnable(?int $value = null): self
    {
        $this->updateItemModifierListsMaxModifierListsToEnable = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getUpdateItemModifierListsMaxModifierListsToDisable(): ?int
    {
        return $this->updateItemModifierListsMaxModifierListsToDisable;
    }

    /**
     * @param ?int $value
     */
    public function setUpdateItemModifierListsMaxModifierListsToDisable(?int $value = null): self
    {
        $this->updateItemModifierListsMaxModifierListsToDisable = $value;
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
