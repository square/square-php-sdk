<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * A batch of catalog objects.
 */
class CatalogObjectBatch implements \JsonSerializable
{
    /**
     * @var CatalogObject[]
     */
    private $objects;

    /**
     * @param CatalogObject[] $objects
     */
    public function __construct(array $objects)
    {
        $this->objects = $objects;
    }

    /**
     * Returns Objects.
     *
     * A list of CatalogObjects belonging to this batch.
     *
     * @return CatalogObject[]
     */
    public function getObjects(): array
    {
        return $this->objects;
    }

    /**
     * Sets Objects.
     *
     * A list of CatalogObjects belonging to this batch.
     *
     * @required
     * @maps objects
     *
     * @param CatalogObject[] $objects
     */
    public function setObjects(array $objects): void
    {
        $this->objects = $objects;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['objects'] = $this->objects;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
