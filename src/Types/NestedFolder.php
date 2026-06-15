<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class NestedFolder extends JsonSerializableType
{
    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    private string $name;

    /**
     * @var array<string> $members
     */
    #[JsonProperty('members'), ArrayType(['string'])]
    private array $members;

    /**
     * @param array{
     *   name: string,
     *   members: array<string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->members = $values['members'];
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $value
     */
    public function setName(string $value): self
    {
        $this->name = $value;
        $this->_setField('name');
        return $this;
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
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
