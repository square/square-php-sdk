<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Query to find `CatalogModifier` objects that reference a given `CatalogModifierList` in their `child_modifier_list_ids` field.
 */
class CatalogQueryModifiersForChildList extends JsonSerializableType
{
    /**
     * The `CatalogModifierList` IDs to find parent `CatalogModifier`s for.
     * Returns `CatalogModifier` objects where `child_modifier_list_ids` contains any of these IDs.
     *
     * @var array<string> $childModifierListIds
     */
    #[JsonProperty('child_modifier_list_ids'), ArrayType(['string'])]
    private array $childModifierListIds;

    /**
     * @param array{
     *   childModifierListIds: array<string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->childModifierListIds = $values['childModifierListIds'];
    }

    /**
     * @return array<string>
     */
    public function getChildModifierListIds(): array
    {
        return $this->childModifierListIds;
    }

    /**
     * @param array<string> $value
     */
    public function setChildModifierListIds(array $value): self
    {
        $this->childModifierListIds = $value;
        $this->_setField('childModifierListIds');
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
