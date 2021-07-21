<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * A Square API V1 identifier of an item, including the object ID and its associated location ID.
 */
class CatalogV1Id implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $catalogV1Id;

    /**
     * @var string|null
     */
    private $locationId;

    /**
     * Returns Catalog V1 Id.
     *
     * The ID for an object used in the Square API V1, if the object ID differs from the Square API V2
     * object ID.
     */
    public function getCatalogV1Id(): ?string
    {
        return $this->catalogV1Id;
    }

    /**
     * Sets Catalog V1 Id.
     *
     * The ID for an object used in the Square API V1, if the object ID differs from the Square API V2
     * object ID.
     *
     * @maps catalog_v1_id
     */
    public function setCatalogV1Id(?string $catalogV1Id): void
    {
        $this->catalogV1Id = $catalogV1Id;
    }

    /**
     * Returns Location Id.
     *
     * The ID of the `Location` this Connect V1 ID is associated with.
     */
    public function getLocationId(): ?string
    {
        return $this->locationId;
    }

    /**
     * Sets Location Id.
     *
     * The ID of the `Location` this Connect V1 ID is associated with.
     *
     * @maps location_id
     */
    public function setLocationId(?string $locationId): void
    {
        $this->locationId = $locationId;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->catalogV1Id)) {
            $json['catalog_v1_id'] = $this->catalogV1Id;
        }
        if (isset($this->locationId)) {
            $json['location_id']   = $this->locationId;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
