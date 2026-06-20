<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class DimensionGranularity extends JsonSerializableType
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
     * @var ?string $interval
     */
    #[JsonProperty('interval')]
    private ?string $interval;

    /**
     * @var ?string $sql
     */
    #[JsonProperty('sql')]
    private ?string $sql;

    /**
     * @var ?string $offset
     */
    #[JsonProperty('offset')]
    private ?string $offset;

    /**
     * @var ?string $origin
     */
    #[JsonProperty('origin')]
    private ?string $origin;

    /**
     * @param array{
     *   name: string,
     *   title: string,
     *   interval?: ?string,
     *   sql?: ?string,
     *   offset?: ?string,
     *   origin?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->title = $values['title'];
        $this->interval = $values['interval'] ?? null;
        $this->sql = $values['sql'] ?? null;
        $this->offset = $values['offset'] ?? null;
        $this->origin = $values['origin'] ?? null;
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
    public function getInterval(): ?string
    {
        return $this->interval;
    }

    /**
     * @param ?string $value
     */
    public function setInterval(?string $value = null): self
    {
        $this->interval = $value;
        $this->_setField('interval');
        return $this;
    }

    /**
     * @return ?string
     */
    public function getSql(): ?string
    {
        return $this->sql;
    }

    /**
     * @param ?string $value
     */
    public function setSql(?string $value = null): self
    {
        $this->sql = $value;
        $this->_setField('sql');
        return $this;
    }

    /**
     * @return ?string
     */
    public function getOffset(): ?string
    {
        return $this->offset;
    }

    /**
     * @param ?string $value
     */
    public function setOffset(?string $value = null): self
    {
        $this->offset = $value;
        $this->_setField('offset');
        return $this;
    }

    /**
     * @return ?string
     */
    public function getOrigin(): ?string
    {
        return $this->origin;
    }

    /**
     * @param ?string $value
     */
    public function setOrigin(?string $value = null): self
    {
        $this->origin = $value;
        $this->_setField('origin');
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
