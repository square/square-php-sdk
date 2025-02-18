<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * A batch of catalog objects.
 */
class CatalogObjectBatch extends JsonSerializableType
{
    /**
     * @var array<CatalogObject> $objects A list of CatalogObjects belonging to this batch.
     */
    #[JsonProperty('objects'), ArrayType([CatalogObject::class])]
    private array $objects;

    /**
     * @param array{
     *   objects: array<CatalogObject>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->objects = $values['objects'];
    }

    /**
     * @return array<CatalogObject>
     */
    public function getObjects(): array
    {
        return $this->objects;
    }

    /**
     * @param array<CatalogObject> $value
     */
    public function setObjects(array $value): self
    {
        $this->objects = $value;
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
