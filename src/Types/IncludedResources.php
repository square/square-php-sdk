<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Related resources of the response `CatalogObject`s requested using `IncludeOptions`
 */
class IncludedResources extends JsonSerializableType
{
    /**
     * @var ?array<CatalogObject> $nestedModifiers Nested `CatalogModifierList`s as requested via `INCLUDE_NESTED_MODIFIERS`.
     */
    #[JsonProperty('nested_modifiers'), ArrayType([CatalogObject::class])]
    private ?array $nestedModifiers;

    /**
     * @var ?array<CatalogObject> $ancestorModifiers Ancestor `CatalogModifierList`s as requested via INCLUDE_ANCESTOR_MODIFIERS
     */
    #[JsonProperty('ancestor_modifiers'), ArrayType([CatalogObject::class])]
    private ?array $ancestorModifiers;

    /**
     * @param array{
     *   nestedModifiers?: ?array<CatalogObject>,
     *   ancestorModifiers?: ?array<CatalogObject>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->nestedModifiers = $values['nestedModifiers'] ?? null;
        $this->ancestorModifiers = $values['ancestorModifiers'] ?? null;
    }

    /**
     * @return ?array<CatalogObject>
     */
    public function getNestedModifiers(): ?array
    {
        return $this->nestedModifiers;
    }

    /**
     * @param ?array<CatalogObject> $value
     */
    public function setNestedModifiers(?array $value = null): self
    {
        $this->nestedModifiers = $value;
        $this->_setField('nestedModifiers');
        return $this;
    }

    /**
     * @return ?array<CatalogObject>
     */
    public function getAncestorModifiers(): ?array
    {
        return $this->ancestorModifiers;
    }

    /**
     * @param ?array<CatalogObject> $value
     */
    public function setAncestorModifiers(?array $value = null): self
    {
        $this->ancestorModifiers = $value;
        $this->_setField('ancestorModifiers');
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
