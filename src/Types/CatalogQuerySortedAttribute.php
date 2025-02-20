<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * The query expression to specify the key to sort search results.
 */
class CatalogQuerySortedAttribute extends JsonSerializableType
{
    /**
     * @var string $attributeName The attribute whose value is used as the sort key.
     */
    #[JsonProperty('attribute_name')]
    private string $attributeName;

    /**
     * The first attribute value to be returned by the query. Ascending sorts will return only
     * objects with this value or greater, while descending sorts will return only objects with this value
     * or less. If unset, start at the beginning (for ascending sorts) or end (for descending sorts).
     *
     * @var ?string $initialAttributeValue
     */
    #[JsonProperty('initial_attribute_value')]
    private ?string $initialAttributeValue;

    /**
     * The desired sort order, `"ASC"` (ascending) or `"DESC"` (descending).
     * See [SortOrder](#type-sortorder) for possible values
     *
     * @var ?value-of<SortOrder> $sortOrder
     */
    #[JsonProperty('sort_order')]
    private ?string $sortOrder;

    /**
     * @param array{
     *   attributeName: string,
     *   initialAttributeValue?: ?string,
     *   sortOrder?: ?value-of<SortOrder>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->attributeName = $values['attributeName'];
        $this->initialAttributeValue = $values['initialAttributeValue'] ?? null;
        $this->sortOrder = $values['sortOrder'] ?? null;
    }

    /**
     * @return string
     */
    public function getAttributeName(): string
    {
        return $this->attributeName;
    }

    /**
     * @param string $value
     */
    public function setAttributeName(string $value): self
    {
        $this->attributeName = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getInitialAttributeValue(): ?string
    {
        return $this->initialAttributeValue;
    }

    /**
     * @param ?string $value
     */
    public function setInitialAttributeValue(?string $value = null): self
    {
        $this->initialAttributeValue = $value;
        return $this;
    }

    /**
     * @return ?value-of<SortOrder>
     */
    public function getSortOrder(): ?string
    {
        return $this->sortOrder;
    }

    /**
     * @param ?value-of<SortOrder> $value
     */
    public function setSortOrder(?string $value = null): self
    {
        $this->sortOrder = $value;
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
