<?php

namespace Square\Catalog\Object\Requests;

use Square\Core\Json\JsonSerializableType;

class GetObjectRequest extends JsonSerializableType
{
    /**
     * @var string $objectId The object ID of any type of catalog objects to be retrieved.
     */
    private string $objectId;

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
    private ?bool $includeRelatedObjects;

    /**
     * Requests objects as of a specific version of the catalog. This allows you to retrieve historical
     * versions of objects. The value to retrieve a specific version of an object can be found
     * in the version field of [CatalogObject](entity:CatalogObject)s. If not included, results will
     * be from the current version of the catalog.
     *
     * @var ?int $catalogVersion
     */
    private ?int $catalogVersion;

    /**
     * Specifies whether or not to include the `path_to_root` list for each returned category instance. The `path_to_root` list consists
     * of `CategoryPathToRootNode` objects and specifies the path that starts with the immediate parent category of the returned category
     * and ends with its root category. If the returned category is a top-level category, the `path_to_root` list is empty and is not returned
     * in the response payload.
     *
     * @var ?bool $includeCategoryPathToRoot
     */
    private ?bool $includeCategoryPathToRoot;

    /**
     * @param array{
     *   objectId: string,
     *   includeRelatedObjects?: ?bool,
     *   catalogVersion?: ?int,
     *   includeCategoryPathToRoot?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->objectId = $values['objectId'];
        $this->includeRelatedObjects = $values['includeRelatedObjects'] ?? null;
        $this->catalogVersion = $values['catalogVersion'] ?? null;
        $this->includeCategoryPathToRoot = $values['includeCategoryPathToRoot'] ?? null;
    }

    /**
     * @return string
     */
    public function getObjectId(): string
    {
        return $this->objectId;
    }

    /**
     * @param string $value
     */
    public function setObjectId(string $value): self
    {
        $this->objectId = $value;
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
