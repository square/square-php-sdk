<?php

declare(strict_types=1);

namespace Square\Models;

class RetrieveCatalogObjectRequest implements \JsonSerializable
{
    /**
     * @var bool|null
     */
    private $includeRelatedObjects;

    /**
     * @var int|null
     */
    private $catalogVersion;

    /**
     * Returns Include Related Objects.
     *
     * If `true`, the response will include additional objects that are related to the
     * requested object, as follows:
     *
     * If the `object` field of the response contains a `CatalogItem`, its associated
     * `CatalogCategory`, `CatalogTax`, `CatalogImage` and `CatalogModifierList` objects will
     * be returned in the `related_objects` field of the response. If the `object` field of
     * the response contains a `CatalogItemVariation`, its parent `CatalogItem` will be returned
     * in the `related_objects` field of the response.
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
     * requested object, as follows:
     *
     * If the `object` field of the response contains a `CatalogItem`, its associated
     * `CatalogCategory`, `CatalogTax`, `CatalogImage` and `CatalogModifierList` objects will
     * be returned in the `related_objects` field of the response. If the `object` field of
     * the response contains a `CatalogItemVariation`, its parent `CatalogItem` will be returned
     * in the `related_objects` field of the response.
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
     * Requests objects as of a specific version of the catalog. This allows you to retrieve historical
     * versions of objects. The value to retrieve a specific version of an object can be found
     * in the version field of [CatalogObject]($m/CatalogObject)s.
     */
    public function getCatalogVersion(): ?int
    {
        return $this->catalogVersion;
    }

    /**
     * Sets Catalog Version.
     *
     * Requests objects as of a specific version of the catalog. This allows you to retrieve historical
     * versions of objects. The value to retrieve a specific version of an object can be found
     * in the version field of [CatalogObject]($m/CatalogObject)s.
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
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->includeRelatedObjects)) {
            $json['include_related_objects'] = $this->includeRelatedObjects;
        }
        if (isset($this->catalogVersion)) {
            $json['catalog_version']         = $this->catalogVersion;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
