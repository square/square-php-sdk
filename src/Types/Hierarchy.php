<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class Hierarchy extends JsonSerializableType
{
    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    private string $name;

    /**
     * @var ?string $aliasMember When hierarchy is defined in Cube, it keeps the original path: Cube.hierarchy
     */
    #[JsonProperty('aliasMember')]
    private ?string $aliasMember;

    /**
     * @var ?string $title
     */
    #[JsonProperty('title')]
    private ?string $title;

    /**
     * @var array<string> $levels
     */
    #[JsonProperty('levels'), ArrayType(['string'])]
    private array $levels;

    /**
     * @param array{
     *   name: string,
     *   levels: array<string>,
     *   aliasMember?: ?string,
     *   title?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->aliasMember = $values['aliasMember'] ?? null;
        $this->title = $values['title'] ?? null;
        $this->levels = $values['levels'];
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
     * @return ?string
     */
    public function getAliasMember(): ?string
    {
        return $this->aliasMember;
    }

    /**
     * @param ?string $value
     */
    public function setAliasMember(?string $value = null): self
    {
        $this->aliasMember = $value;
        $this->_setField('aliasMember');
        return $this;
    }

    /**
     * @return ?string
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param ?string $value
     */
    public function setTitle(?string $value = null): self
    {
        $this->title = $value;
        $this->_setField('title');
        return $this;
    }

    /**
     * @return array<string>
     */
    public function getLevels(): array
    {
        return $this->levels;
    }

    /**
     * @param array<string> $value
     */
    public function setLevels(array $value): self
    {
        $this->levels = $value;
        $this->_setField('levels');
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
