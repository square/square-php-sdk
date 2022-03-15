<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

class BatchDeleteCatalogObjectsRequest implements \JsonSerializable
{
    /**
     * @var string[]|null
     */
    private $objectIds;

    /**
     * Returns Object Ids.
     *
     * The IDs of the CatalogObjects to be deleted. When an object is deleted, other objects
     * in the graph that depend on that object will be deleted as well (for example, deleting a
     * CatalogItem will delete its CatalogItemVariation.
     *
     * @return string[]|null
     */
    public function getObjectIds(): ?array
    {
        return $this->objectIds;
    }

    /**
     * Sets Object Ids.
     *
     * The IDs of the CatalogObjects to be deleted. When an object is deleted, other objects
     * in the graph that depend on that object will be deleted as well (for example, deleting a
     * CatalogItem will delete its CatalogItemVariation.
     *
     * @maps object_ids
     *
     * @param string[]|null $objectIds
     */
    public function setObjectIds(?array $objectIds): void
    {
        $this->objectIds = $objectIds;
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
        if (isset($this->objectIds)) {
            $json['object_ids'] = $this->objectIds;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
