<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class CatalogVersionUpdatedEventObject extends JsonSerializableType
{
    /**
     * @var ?CatalogVersionUpdatedEventCatalogVersion $catalogVersion The version of the object.
     */
    #[JsonProperty('catalog_version')]
    private ?CatalogVersionUpdatedEventCatalogVersion $catalogVersion;

    /**
     * @param array{
     *   catalogVersion?: ?CatalogVersionUpdatedEventCatalogVersion,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->catalogVersion = $values['catalogVersion'] ?? null;
    }

    /**
     * @return ?CatalogVersionUpdatedEventCatalogVersion
     */
    public function getCatalogVersion(): ?CatalogVersionUpdatedEventCatalogVersion
    {
        return $this->catalogVersion;
    }

    /**
     * @param ?CatalogVersionUpdatedEventCatalogVersion $value
     */
    public function setCatalogVersion(?CatalogVersionUpdatedEventCatalogVersion $value = null): self
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
