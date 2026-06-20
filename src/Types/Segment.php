<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class Segment extends JsonSerializableType
{
    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    private string $name;

    /**
     * @var string $title
     */
    #[JsonProperty('title')]
    private string $title;

    /**
     * @var ?string $description
     */
    #[JsonProperty('description')]
    private ?string $description;

    /**
     * @var string $shortTitle
     */
    #[JsonProperty('shortTitle')]
    private string $shortTitle;

    /**
     * @var ?array<string, mixed> $meta
     */
    #[JsonProperty('meta'), ArrayType(['string' => 'mixed'])]
    private ?array $meta;

    /**
     * @param array{
     *   name: string,
     *   title: string,
     *   shortTitle: string,
     *   description?: ?string,
     *   meta?: ?array<string, mixed>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->title = $values['title'];
        $this->description = $values['description'] ?? null;
        $this->shortTitle = $values['shortTitle'];
        $this->meta = $values['meta'] ?? null;
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
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $value
     */
    public function setTitle(string $value): self
    {
        $this->title = $value;
        $this->_setField('title');
        return $this;
    }

    /**
     * @return ?string
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param ?string $value
     */
    public function setDescription(?string $value = null): self
    {
        $this->description = $value;
        $this->_setField('description');
        return $this;
    }

    /**
     * @return string
     */
    public function getShortTitle(): string
    {
        return $this->shortTitle;
    }

    /**
     * @param string $value
     */
    public function setShortTitle(string $value): self
    {
        $this->shortTitle = $value;
        $this->_setField('shortTitle');
        return $this;
    }

    /**
     * @return ?array<string, mixed>
     */
    public function getMeta(): ?array
    {
        return $this->meta;
    }

    /**
     * @param ?array<string, mixed> $value
     */
    public function setMeta(?array $value = null): self
    {
        $this->meta = $value;
        $this->_setField('meta');
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
