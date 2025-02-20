<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * A Square API V1 identifier of an item, including the object ID and its associated location ID.
 */
class CatalogV1Id extends JsonSerializableType
{
    /**
     * @var ?string $catalogV1Id The ID for an object used in the Square API V1, if the object ID differs from the Square API V2 object ID.
     */
    #[JsonProperty('catalog_v1_id')]
    private ?string $catalogV1Id;

    /**
     * @var ?string $locationId The ID of the `Location` this Connect V1 ID is associated with.
     */
    #[JsonProperty('location_id')]
    private ?string $locationId;

    /**
     * @param array{
     *   catalogV1Id?: ?string,
     *   locationId?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->catalogV1Id = $values['catalogV1Id'] ?? null;
        $this->locationId = $values['locationId'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getCatalogV1Id(): ?string
    {
        return $this->catalogV1Id;
    }

    /**
     * @param ?string $value
     */
    public function setCatalogV1Id(?string $value = null): self
    {
        $this->catalogV1Id = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getLocationId(): ?string
    {
        return $this->locationId;
    }

    /**
     * @param ?string $value
     */
    public function setLocationId(?string $value = null): self
    {
        $this->locationId = $value;
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
