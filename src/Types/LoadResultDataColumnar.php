<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Columnar data format - members list paired with one primitive array per column. Returned when `responseFormat=columnar` is requested.
 */
class LoadResultDataColumnar extends JsonSerializableType
{
    /**
     * @var array<string> $members Ordered list of member names. Element `i` of `columns` holds the values for `members[i]` across all rows.
     */
    #[JsonProperty('members'), ArrayType(['string'])]
    private array $members;

    /**
     * @var array<array<mixed>> $columns One array per member, in the same order as `members`. Each inner array contains the primitive value of that member for every row (null, boolean, number, string).
     */
    #[JsonProperty('columns'), ArrayType([['mixed']])]
    private array $columns;

    /**
     * @param array{
     *   members: array<string>,
     *   columns: array<array<mixed>>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->members = $values['members'];
        $this->columns = $values['columns'];
    }

    /**
     * @return array<string>
     */
    public function getMembers(): array
    {
        return $this->members;
    }

    /**
     * @param array<string> $value
     */
    public function setMembers(array $value): self
    {
        $this->members = $value;
        $this->_setField('members');
        return $this;
    }

    /**
     * @return array<array<mixed>>
     */
    public function getColumns(): array
    {
        return $this->columns;
    }

    /**
     * @param array<array<mixed>> $value
     */
    public function setColumns(array $value): self
    {
        $this->columns = $value;
        $this->_setField('columns');
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
