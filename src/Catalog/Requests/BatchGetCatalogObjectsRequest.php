<?php

namespace Square\Catalog\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class BatchGetCatalogObjectsRequest extends JsonSerializableType
{
    /**
     * @var array<string> $objectIds The IDs of the CatalogObjects to be retrieved.
     */
    #[JsonProperty('object_ids'), ArrayType(['string'])]
    private array $objectIds;

    /**
     * If `true`, the response will include additional objects that are related to the
     * requested objects. Related objects are defined as any objects referenced by ID by the results in the `objects` field
     * of the response. These objects are put in the `related_objects` field. Setting this to `true` is
     * helpful when the objects are needed for immediate display to a user.
     * This process only goes one level deep. Objects referenced by the related objects will not be included. For example,
     *
     * if the `objects` field of the response contains a CatalogItem, its associated
     * CatalogCategory objects, CatalogTax objects, CatalogImage objects and
     * CatalogModifierLists will be returned in the `related_objects` field of the
     * response. If the `objects` field of the response contains a CatalogItemVariation,
     * its parent CatalogItem will be returned in the `related_objects` field of
     * the response.
     *
     * Default value: `false`
     *
     * @var ?bool $includeRelatedObjects
     */
    #[JsonProperty('include_related_objects')]
    private ?bool $includeRelatedObjects;

    /**
     * The specific version of the catalog objects to be included in the response.
     * This allows you to retrieve historical versions of objects. The specified version value is matched against
     * the [CatalogObject](entity:CatalogObject)s' `version` attribute. If not included, results will
     * be from the current version of the catalog.
     *
     * @var ?int $catalogVersion
     */
    #[JsonProperty('catalog_version')]
    private ?int $catalogVersion;

    /**
     * @var ?bool $includeDeletedObjects Indicates whether to include (`true`) or not (`false`) in the response deleted objects, namely, those with the `is_deleted` attribute set to `true`.
     */
    #[JsonProperty('include_deleted_objects')]
    private ?bool $includeDeletedObjects;

    /**
     * Specifies whether or not to include the `path_to_root` list for each returned category instance. The `path_to_root` list consists
     * of `CategoryPathToRootNode` objects and specifies the path that starts with the immediate parent category of the returned category
     * and ends with its root category. If the returned category is a top-level category, the `path_to_root` list is empty and is not returned
     * in the response payload.
     *
     * @var ?bool $includeCategoryPathToRoot
     */
    #[JsonProperty('include_category_path_to_root')]
    private ?bool $includeCategoryPathToRoot;

    /**
     * @param array{
     *   objectIds: array<string>,
     *   includeRelatedObjects?: ?bool,
     *   catalogVersion?: ?int,
     *   includeDeletedObjects?: ?bool,
     *   includeCategoryPathToRoot?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->objectIds = $values['objectIds'];
        $this->includeRelatedObjects = $values['includeRelatedObjects'] ?? null;
        $this->catalogVersion = $values['catalogVersion'] ?? null;
        $this->includeDeletedObjects = $values['includeDeletedObjects'] ?? null;
        $this->includeCategoryPathToRoot = $values['includeCategoryPathToRoot'] ?? null;
    }

    /**
     * @return array<string>
     */
    public function getObjectIds(): array
    {
        return $this->objectIds;
    }

    /**
     * @param array<string> $value
     */
    public function setObjectIds(array $value): self
    {
        $this->objectIds = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getIncludeRelatedObjects(): ?bool
    {
        return $this->includeRelatedObjects;
    }

    /**
     * @param ?bool $value
     */
    public function setIncludeRelatedObjects(?bool $value = null): self
    {
        $this->includeRelatedObjects = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getCatalogVersion(): ?int
    {
        return $this->catalogVersion;
    }

    /**
     * @param ?int $value
     */
    public function setCatalogVersion(?int $value = null): self
    {
        $this->catalogVersion = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getIncludeDeletedObjects(): ?bool
    {
        return $this->includeDeletedObjects;
    }

    /**
     * @param ?bool $value
     */
    public function setIncludeDeletedObjects(?bool $value = null): self
    {
        $this->includeDeletedObjects = $value;
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getIncludeCategoryPathToRoot(): ?bool
    {
        return $this->includeCategoryPathToRoot;
    }

    /**
     * @param ?bool $value
     */
    public function setIncludeCategoryPathToRoot(?bool $value = null): self
    {
        $this->includeCategoryPathToRoot = $value;
        return $this;
    }
}
