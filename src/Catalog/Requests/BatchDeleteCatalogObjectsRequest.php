<?php

namespace Square\Catalog\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class BatchDeleteCatalogObjectsRequest extends JsonSerializableType
{
    /**
     * The IDs of the CatalogObjects to be deleted. When an object is deleted, other objects
     * in the graph that depend on that object will be deleted as well (for example, deleting a
     * CatalogItem will delete its CatalogItemVariation.
     *
     * @var array<string> $objectIds
     */
    #[JsonProperty('object_ids'), ArrayType(['string'])]
    private array $objectIds;

    /**
     * @param array{
     *   objectIds: array<string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->objectIds = $values['objectIds'];
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
}
