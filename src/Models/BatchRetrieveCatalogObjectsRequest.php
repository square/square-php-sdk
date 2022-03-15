<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

class BatchRetrieveCatalogObjectsRequest implements \JsonSerializable
{
    /**
     * @var string[]
     */
    private $objectIds;

    /**
     * @var bool|null
     */
    private $includeRelatedObjects;

    /**
     * @var int|null
     */
    private $catalogVersion;

    /**
     * @param string[] $objectIds
     */
    public function __construct(array $objectIds)
    {
        $this->objectIds = $objectIds;
    }

    /**
     * Returns Object Ids.
     *
     * The IDs of the CatalogObjects to be retrieved.
     *
     * @return string[]
     */
    public function getObjectIds(): array
    {
        return $this->objectIds;
    }

    /**
     * Sets Object Ids.
     *
     * The IDs of the CatalogObjects to be retrieved.
     *
     * @required
     * @maps object_ids
     *
     * @param string[] $objectIds
     */
    public function setObjectIds(array $objectIds): void
    {
        $this->objectIds = $objectIds;
    }

    /**
     * Returns Include Related Objects.
     *
     * If `true`, the response will include additional objects that are related to the
     * requested objects. Related objects are defined as any objects referenced by ID by the results in the
     * `objects` field
     * of the response. These objects are put in the `related_objects` field. Setting this to `true` is
     * helpful when the objects are needed for immediate display to a user.
     * This process only goes one level deep. Objects referenced by the related objects will not be
     * included. For example,
     *
     * if the `objects` field of the response contains a CatalogItem, its associated
     * CatalogCategory objects, CatalogTax objects, CatalogImage objects and
     * CatalogModifierLists will be returned in the `related_objects` field of the
     * response. If the `objects` field of the response contains a CatalogItemVariation,
     * its parent CatalogItem will be returned in the `related_objects` field of
     * the response.
     *
     * Default value: `false`
     */
    public function getIncludeRelatedObjects(): ?bool
    {
        return $this->includeRelatedObjects;
    }

    /**
     * Sets Include Related Objects.
     *
     * If `true`, the response will include additional objects that are related to the
     * requested objects. Related objects are defined as any objects referenced by ID by the results in the
     * `objects` field
     * of the response. These objects are put in the `related_objects` field. Setting this to `true` is
     * helpful when the objects are needed for immediate display to a user.
     * This process only goes one level deep. Objects referenced by the related objects will not be
     * included. For example,
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
     * @maps include_related_objects
     */
    public function setIncludeRelatedObjects(?bool $includeRelatedObjects): void
    {
        $this->includeRelatedObjects = $includeRelatedObjects;
    }

    /**
     * Returns Catalog Version.
     *
     * The specific version of the catalog objects to be included in the response.
     * This allows you to retrieve historical versions of objects. The specified version value is matched
     * against
     * the [CatalogObject]($m/CatalogObject)s' `version` attribute. If not included, results will
     * be from the current version of the catalog.
     */
    public function getCatalogVersion(): ?int
    {
        return $this->catalogVersion;
    }

    /**
     * Sets Catalog Version.
     *
     * The specific version of the catalog objects to be included in the response.
     * This allows you to retrieve historical versions of objects. The specified version value is matched
     * against
     * the [CatalogObject]($m/CatalogObject)s' `version` attribute. If not included, results will
     * be from the current version of the catalog.
     *
     * @maps catalog_version
     */
    public function setCatalogVersion(?int $catalogVersion): void
    {
        $this->catalogVersion = $catalogVersion;
    }

    /**
     * Encode this object to JSON
     *
     * @param bool $asArrayWhenEmpty Whether to serialize this model as an array whenever no fields
     *        are set. (default: false)
     *
     * @return array|stdClass
     */
    #[\ReturnTypeWillChange] // @phan-suppress-current-line PhanUndeclaredClassAttribute for (php < 8.1)
    public function jsonSerialize(bool $asArrayWhenEmpty = false)
    {
        $json = [];
        $json['object_ids']                  = $this->objectIds;
        if (isset($this->includeRelatedObjects)) {
            $json['include_related_objects'] = $this->includeRelatedObjects;
        }
        if (isset($this->catalogVersion)) {
            $json['catalog_version']         = $this->catalogVersion;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
