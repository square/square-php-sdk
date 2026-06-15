<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class Cube extends JsonSerializableType
{
    /**
     * @var string $name
     */
    #[JsonProperty('name')]
    private string $name;

    /**
     * @var ?string $title
     */
    #[JsonProperty('title')]
    private ?string $title;

    /**
     * @var value-of<CubeType> $type
     */
    #[JsonProperty('type')]
    private string $type;

    /**
     * @var ?array<string, mixed> $meta
     */
    #[JsonProperty('meta'), ArrayType(['string' => 'mixed'])]
    private ?array $meta;

    /**
     * @var ?string $description
     */
    #[JsonProperty('description')]
    private ?string $description;

    /**
     * @var array<Measure> $measures
     */
    #[JsonProperty('measures'), ArrayType([Measure::class])]
    private array $measures;

    /**
     * @var array<Dimension> $dimensions
     */
    #[JsonProperty('dimensions'), ArrayType([Dimension::class])]
    private array $dimensions;

    /**
     * @var array<Segment> $segments
     */
    #[JsonProperty('segments'), ArrayType([Segment::class])]
    private array $segments;

    /**
     * @var ?array<CubeJoin> $joins
     */
    #[JsonProperty('joins'), ArrayType([CubeJoin::class])]
    private ?array $joins;

    /**
     * @var ?array<Folder> $folders
     */
    #[JsonProperty('folders'), ArrayType([Folder::class])]
    private ?array $folders;

    /**
     * @var ?array<NestedFolder> $nestedFolders
     */
    #[JsonProperty('nestedFolders'), ArrayType([NestedFolder::class])]
    private ?array $nestedFolders;

    /**
     * @var ?array<Hierarchy> $hierarchies
     */
    #[JsonProperty('hierarchies'), ArrayType([Hierarchy::class])]
    private ?array $hierarchies;

    /**
     * @param array{
     *   name: string,
     *   type: value-of<CubeType>,
     *   measures: array<Measure>,
     *   dimensions: array<Dimension>,
     *   segments: array<Segment>,
     *   title?: ?string,
     *   meta?: ?array<string, mixed>,
     *   description?: ?string,
     *   joins?: ?array<CubeJoin>,
     *   folders?: ?array<Folder>,
     *   nestedFolders?: ?array<NestedFolder>,
     *   hierarchies?: ?array<Hierarchy>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->name = $values['name'];
        $this->title = $values['title'] ?? null;
        $this->type = $values['type'];
        $this->meta = $values['meta'] ?? null;
        $this->description = $values['description'] ?? null;
        $this->measures = $values['measures'];
        $this->dimensions = $values['dimensions'];
        $this->segments = $values['segments'];
        $this->joins = $values['joins'] ?? null;
        $this->folders = $values['folders'] ?? null;
        $this->nestedFolders = $values['nestedFolders'] ?? null;
        $this->hierarchies = $values['hierarchies'] ?? null;
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
     * @return value-of<CubeType>
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param value-of<CubeType> $value
     */
    public function setType(string $value): self
    {
        $this->type = $value;
        $this->_setField('type');
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
     * @return array<Measure>
     */
    public function getMeasures(): array
    {
        return $this->measures;
    }

    /**
     * @param array<Measure> $value
     */
    public function setMeasures(array $value): self
    {
        $this->measures = $value;
        $this->_setField('measures');
        return $this;
    }

    /**
     * @return array<Dimension>
     */
    public function getDimensions(): array
    {
        return $this->dimensions;
    }

    /**
     * @param array<Dimension> $value
     */
    public function setDimensions(array $value): self
    {
        $this->dimensions = $value;
        $this->_setField('dimensions');
        return $this;
    }

    /**
     * @return array<Segment>
     */
    public function getSegments(): array
    {
        return $this->segments;
    }

    /**
     * @param array<Segment> $value
     */
    public function setSegments(array $value): self
    {
        $this->segments = $value;
        $this->_setField('segments');
        return $this;
    }

    /**
     * @return ?array<CubeJoin>
     */
    public function getJoins(): ?array
    {
        return $this->joins;
    }

    /**
     * @param ?array<CubeJoin> $value
     */
    public function setJoins(?array $value = null): self
    {
        $this->joins = $value;
        $this->_setField('joins');
        return $this;
    }

    /**
     * @return ?array<Folder>
     */
    public function getFolders(): ?array
    {
        return $this->folders;
    }

    /**
     * @param ?array<Folder> $value
     */
    public function setFolders(?array $value = null): self
    {
        $this->folders = $value;
        $this->_setField('folders');
        return $this;
    }

    /**
     * @return ?array<NestedFolder>
     */
    public function getNestedFolders(): ?array
    {
        return $this->nestedFolders;
    }

    /**
     * @param ?array<NestedFolder> $value
     */
    public function setNestedFolders(?array $value = null): self
    {
        $this->nestedFolders = $value;
        $this->_setField('nestedFolders');
        return $this;
    }

    /**
     * @return ?array<Hierarchy>
     */
    public function getHierarchies(): ?array
    {
        return $this->hierarchies;
    }

    /**
     * @param ?array<Hierarchy> $value
     */
    public function setHierarchies(?array $value = null): self
    {
        $this->hierarchies = $value;
        $this->_setField('hierarchies');
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
