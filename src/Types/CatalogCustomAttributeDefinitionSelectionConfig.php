<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Configuration associated with `SELECTION`-type custom attribute definitions.
 */
class CatalogCustomAttributeDefinitionSelectionConfig extends JsonSerializableType
{
    /**
     * The maximum number of selections that can be set. The maximum value for this
     * attribute is 100. The default value is 1. The value can be modified, but changing the value will not
     * affect existing custom attribute values on objects. Clients need to
     * handle custom attributes with more selected values than allowed by this limit.
     *
     * @var ?int $maxAllowedSelections
     */
    #[JsonProperty('max_allowed_selections')]
    private ?int $maxAllowedSelections;

    /**
     * The set of valid `CatalogCustomAttributeSelections`. Up to a maximum of 100
     * selections can be defined. Can be modified.
     *
     * @var ?array<CatalogCustomAttributeDefinitionSelectionConfigCustomAttributeSelection> $allowedSelections
     */
    #[JsonProperty('allowed_selections'), ArrayType([CatalogCustomAttributeDefinitionSelectionConfigCustomAttributeSelection::class])]
    private ?array $allowedSelections;

    /**
     * @param array{
     *   maxAllowedSelections?: ?int,
     *   allowedSelections?: ?array<CatalogCustomAttributeDefinitionSelectionConfigCustomAttributeSelection>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->maxAllowedSelections = $values['maxAllowedSelections'] ?? null;
        $this->allowedSelections = $values['allowedSelections'] ?? null;
    }

    /**
     * @return ?int
     */
    public function getMaxAllowedSelections(): ?int
    {
        return $this->maxAllowedSelections;
    }

    /**
     * @param ?int $value
     */
    public function setMaxAllowedSelections(?int $value = null): self
    {
        $this->maxAllowedSelections = $value;
        return $this;
    }

    /**
     * @return ?array<CatalogCustomAttributeDefinitionSelectionConfigCustomAttributeSelection>
     */
    public function getAllowedSelections(): ?array
    {
        return $this->allowedSelections;
    }

    /**
     * @param ?array<CatalogCustomAttributeDefinitionSelectionConfigCustomAttributeSelection> $value
     */
    public function setAllowedSelections(?array $value = null): self
    {
        $this->allowedSelections = $value;
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
