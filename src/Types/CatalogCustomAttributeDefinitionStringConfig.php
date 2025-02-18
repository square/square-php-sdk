<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Configuration associated with Custom Attribute Definitions of type `STRING`.
 */
class CatalogCustomAttributeDefinitionStringConfig extends JsonSerializableType
{
    /**
     * If true, each Custom Attribute instance associated with this Custom Attribute
     * Definition must have a unique value within the seller's catalog. For
     * example, this may be used for a value like a SKU that should not be
     * duplicated within a seller's catalog. May not be modified after the
     * definition has been created.
     *
     * @var ?bool $enforceUniqueness
     */
    #[JsonProperty('enforce_uniqueness')]
    private ?bool $enforceUniqueness;

    /**
     * @param array{
     *   enforceUniqueness?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->enforceUniqueness = $values['enforceUniqueness'] ?? null;
    }

    /**
     * @return ?bool
     */
    public function getEnforceUniqueness(): ?bool
    {
        return $this->enforceUniqueness;
    }

    /**
     * @param ?bool $value
     */
    public function setEnforceUniqueness(?bool $value = null): self
    {
        $this->enforceUniqueness = $value;
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
