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
     * Returns Include Related Objects.
     *
     * If `true`, the response will include additional objects that are related to the
     * requested object, as follows:
     *
     * If the `object` field of the response contains a CatalogItem,
     * its associated CatalogCategory, CatalogTax objects,
     * CatalogImages and CatalogModifierLists
     * will be returned in the `related_objects` field of the response. If the `object`
     * field of the response contains a CatalogItemVariation,
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
     * requested object, as follows:
     *
     * If the `object` field of the response contains a CatalogItem,
     * its associated CatalogCategory, CatalogTax objects,
     * CatalogImages and CatalogModifierLists
     * will be returned in the `related_objects` field of the response. If the `object`
     * field of the response contains a CatalogItemVariation,
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
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['include_related_objects'] = $this->includeRelatedObjects;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
