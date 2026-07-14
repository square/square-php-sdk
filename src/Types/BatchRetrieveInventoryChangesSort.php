<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class BatchRetrieveInventoryChangesSort extends JsonSerializableType
{
    /**
     * The field to sort inventory changes by.
     * See [Field](#type-field) for possible values
     *
     * @var ?'OCCURRED_AT' $field
     */
    #[JsonProperty('field')]
    private ?string $field;

    /**
     * The order to sort inventory changes by.
     * See [SortOrder](#type-sortorder) for possible values
     *
     * @var ?value-of<SortOrder> $order
     */
    #[JsonProperty('order')]
    private ?string $order;

    /**
     * @param array{
     *   field?: ?'OCCURRED_AT',
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
     * @return ?'OCCURRED_AT'
     */
    public function getField(): ?string
    {
        return $this->field;
    }

    /**
     * @param ?'OCCURRED_AT' $value
     */
    public function setField(?string $value = null): self
    {
        $this->field = $value;
        $this->_setField('field');
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
        $this->_setField('order');
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
