<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Defines sort criteria for a [SearchScheduledShifts](api-endpoint:Labor-SearchScheduledShifts)
 * request.
 */
class ScheduledShiftSort extends JsonSerializableType
{
    /**
     * The field to sort on. The default value is `START_AT`.
     * See [ScheduledShiftSortField](#type-scheduledshiftsortfield) for possible values
     *
     * @var ?value-of<ScheduledShiftSortField> $field
     */
    #[JsonProperty('field')]
    private ?string $field;

    /**
     * The order in which results are returned. The default value is `ASC`.
     * See [SortOrder](#type-sortorder) for possible values
     *
     * @var ?value-of<SortOrder> $order
     */
    #[JsonProperty('order')]
    private ?string $order;

    /**
     * @param array{
     *   field?: ?value-of<ScheduledShiftSortField>,
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
     * @return ?value-of<ScheduledShiftSortField>
     */
    public function getField(): ?string
    {
        return $this->field;
    }

    /**
     * @param ?value-of<ScheduledShiftSortField> $value
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
