<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class QueryFilterCondition extends JsonSerializableType
{
    /**
     * @var string $member
     */
    #[JsonProperty('member')]
    private string $member;

    /**
     * @var string $operator
     */
    #[JsonProperty('operator')]
    private string $operator;

    /**
     * @var ?array<string> $values
     */
    #[JsonProperty('values'), ArrayType(['string'])]
    private ?array $values;

    /**
     * @param array{
     *   member: string,
     *   operator: string,
     *   values?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->member = $values['member'];
        $this->operator = $values['operator'];
        $this->values = $values['values'] ?? null;
    }

    /**
     * @return string
     */
    public function getMember(): string
    {
        return $this->member;
    }

    /**
     * @param string $value
     */
    public function setMember(string $value): self
    {
        $this->member = $value;
        $this->_setField('member');
        return $this;
    }

    /**
     * @return string
     */
    public function getOperator(): string
    {
        return $this->operator;
    }

    /**
     * @param string $value
     */
    public function setOperator(string $value): self
    {
        $this->operator = $value;
        $this->_setField('operator');
        return $this;
    }

    /**
     * @return ?array<string>
     */
    public function getValues(): ?array
    {
        return $this->values;
    }

    /**
     * @param ?array<string> $value
     */
    public function setValues(?array $value = null): self
    {
        $this->values = $value;
        $this->_setField('values');
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
