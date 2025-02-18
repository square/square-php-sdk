<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * The query filter to return the items containing the specified modifier list IDs.
 */
class CatalogQueryItemsForModifierList extends JsonSerializableType
{
    /**
     * @var array<string> $modifierListIds A set of `CatalogModifierList` IDs to be used to find associated `CatalogItem`s.
     */
    #[JsonProperty('modifier_list_ids'), ArrayType(['string'])]
    private array $modifierListIds;

    /**
     * @param array{
     *   modifierListIds: array<string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->modifierListIds = $values['modifierListIds'];
    }

    /**
     * @return array<string>
     */
    public function getModifierListIds(): array
    {
        return $this->modifierListIds;
    }

    /**
     * @param array<string> $value
     */
    public function setModifierListIds(array $value): self
    {
        $this->modifierListIds = $value;
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
