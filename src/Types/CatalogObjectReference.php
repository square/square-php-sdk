<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * A reference to a Catalog object at a specific version. In general this is
 * used as an entry point into a graph of catalog objects, where the objects exist
 * at a specific version.
 */
class CatalogObjectReference extends JsonSerializableType
{
    /**
     * @var ?string $objectId The ID of the referenced object.
     */
    #[JsonProperty('object_id')]
    private ?string $objectId;

    /**
     * @var ?int $catalogVersion The version of the object.
     */
    #[JsonProperty('catalog_version')]
    private ?int $catalogVersion;

    /**
     * @param array{
     *   objectId?: ?string,
     *   catalogVersion?: ?int,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->objectId = $values['objectId'] ?? null;
        $this->catalogVersion = $values['catalogVersion'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getObjectId(): ?string
    {
        return $this->objectId;
    }

    /**
     * @param ?string $value
     */
    public function setObjectId(?string $value = null): self
    {
        $this->objectId = $value;
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
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
