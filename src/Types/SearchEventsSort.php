<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Criteria to sort events by.
 */
class SearchEventsSort extends JsonSerializableType
{
    /**
     * Sort events by event types.
     * See [SearchEventsSortField](#type-searcheventssortfield) for possible values
     *
     * @var ?'DEFAULT' $field
     */
    #[JsonProperty('field')]
    private ?string $field;

    /**
     * The order to use for sorting the events.
     * See [SortOrder](#type-sortorder) for possible values
     *
     * @var ?value-of<SortOrder> $order
     */
    #[JsonProperty('order')]
    private ?string $order;

    /**
     * @param array{
     *   field?: ?'DEFAULT',
     *   order?: ?value-of<SortOrder>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->field = $values['field'] ?? null;
        $this->order = $values['order'] ?? null;
    }

    /**
     * @return ?'DEFAULT'
     */
    public function getField(): ?string
    {
        return $this->field;
    }

    /**
     * @param ?'DEFAULT' $value
     */
    public function setField(?string $value = null): self
    {
        $this->field = $value;
        return $this;
    }

    /**
     * @return ?value-of<SortOrder>
     */
    public function getOrder(): ?string
    {
        return $this->order;
    }

    /**
     * @param ?value-of<SortOrder> $value
     */
    public function setOrder(?string $value = null): self
    {
        $this->order = $value;
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
