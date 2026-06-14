<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Compact data format - a single object with the members list and a dataset of primitive arrays. Returned when `responseFormat=compact` is requested.
 */
class LoadResultDataCompact extends JsonSerializableType
{
    /**
     * @var array<string> $members Ordered list of member names that correspond to each cell position in `dataset` rows.
     */
    #[JsonProperty('members'), ArrayType(['string'])]
    private array $members;

    /**
     * @var array<array<mixed>> $dataset Array of rows, where each row is an array of primitive values (null, boolean, number, string) aligned with `members`.
     */
    #[JsonProperty('dataset'), ArrayType([['mixed']])]
    private array $dataset;

    /**
     * @param array{
     *   members: array<string>,
     *   dataset: array<array<mixed>>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->members = $values['members'];
        $this->dataset = $values['dataset'];
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
    public function getDataset(): array
    {
        return $this->dataset;
    }

    /**
     * @param array<array<mixed>> $value
     */
    public function setDataset(array $value): self
    {
        $this->dataset = $value;
        $this->_setField('dataset');
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
