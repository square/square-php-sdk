<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;
use Square\Core\Types\Union;

class Query extends JsonSerializableType
{
    /**
     * @var ?array<string> $measures
     */
    #[JsonProperty('measures'), ArrayType(['string'])]
    private ?array $measures;

    /**
     * @var ?array<string> $dimensions
     */
    #[JsonProperty('dimensions'), ArrayType(['string'])]
    private ?array $dimensions;

    /**
     * @var ?array<string> $segments
     */
    #[JsonProperty('segments'), ArrayType(['string'])]
    private ?array $segments;

    /**
     * @var ?array<TimeDimension> $timeDimensions
     */
    #[JsonProperty('timeDimensions'), ArrayType([TimeDimension::class])]
    private ?array $timeDimensions;

    /**
     * @var ?array<array<string>> $order
     */
    #[JsonProperty('order'), ArrayType([['string']])]
    private ?array $order;

    /**
     * @var ?int $limit
     */
    #[JsonProperty('limit')]
    private ?int $limit;

    /**
     * @var ?int $offset
     */
    #[JsonProperty('offset')]
    private ?int $offset;

    /**
     * @var ?array<(
     *    QueryFilterCondition
     *   |QueryFilterOr
     *   |QueryFilterAnd
     * )> $filters
     */
    #[JsonProperty('filters'), ArrayType([new Union(QueryFilterCondition::class, QueryFilterOr::class, QueryFilterAnd::class)])]
    private ?array $filters;

    /**
     * @var ?bool $ungrouped
     */
    #[JsonProperty('ungrouped')]
    private ?bool $ungrouped;

    /**
     * @var ?array<JoinSubquery> $subqueryJoins
     */
    #[JsonProperty('subqueryJoins'), ArrayType([JoinSubquery::class])]
    private ?array $subqueryJoins;

    /**
     * @var ?array<array<string>> $joinHints
     */
    #[JsonProperty('joinHints'), ArrayType([['string']])]
    private ?array $joinHints;

    /**
     * @var ?string $timezone
     */
    #[JsonProperty('timezone')]
    private ?string $timezone;

    /**
     * @param array{
     *   measures?: ?array<string>,
     *   dimensions?: ?array<string>,
     *   segments?: ?array<string>,
     *   timeDimensions?: ?array<TimeDimension>,
     *   order?: ?array<array<string>>,
     *   limit?: ?int,
     *   offset?: ?int,
     *   filters?: ?array<(
     *    QueryFilterCondition
     *   |QueryFilterOr
     *   |QueryFilterAnd
     * )>,
     *   ungrouped?: ?bool,
     *   subqueryJoins?: ?array<JoinSubquery>,
     *   joinHints?: ?array<array<string>>,
     *   timezone?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->measures = $values['measures'] ?? null;
        $this->dimensions = $values['dimensions'] ?? null;
        $this->segments = $values['segments'] ?? null;
        $this->timeDimensions = $values['timeDimensions'] ?? null;
        $this->order = $values['order'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->offset = $values['offset'] ?? null;
        $this->filters = $values['filters'] ?? null;
        $this->ungrouped = $values['ungrouped'] ?? null;
        $this->subqueryJoins = $values['subqueryJoins'] ?? null;
        $this->joinHints = $values['joinHints'] ?? null;
        $this->timezone = $values['timezone'] ?? null;
    }

    /**
     * @return ?array<string>
     */
    public function getMeasures(): ?array
    {
        return $this->measures;
    }

    /**
     * @param ?array<string> $value
     */
    public function setMeasures(?array $value = null): self
    {
        $this->measures = $value;
        $this->_setField('measures');
        return $this;
    }

    /**
     * @return ?array<string>
     */
    public function getDimensions(): ?array
    {
        return $this->dimensions;
    }

    /**
     * @param ?array<string> $value
     */
    public function setDimensions(?array $value = null): self
    {
        $this->dimensions = $value;
        $this->_setField('dimensions');
        return $this;
    }

    /**
     * @return ?array<string>
     */
    public function getSegments(): ?array
    {
        return $this->segments;
    }

    /**
     * @param ?array<string> $value
     */
    public function setSegments(?array $value = null): self
    {
        $this->segments = $value;
        $this->_setField('segments');
        return $this;
    }

    /**
     * @return ?array<TimeDimension>
     */
    public function getTimeDimensions(): ?array
    {
        return $this->timeDimensions;
    }

    /**
     * @param ?array<TimeDimension> $value
     */
    public function setTimeDimensions(?array $value = null): self
    {
        $this->timeDimensions = $value;
        $this->_setField('timeDimensions');
        return $this;
    }

    /**
     * @return ?array<array<string>>
     */
    public function getOrder(): ?array
    {
        return $this->order;
    }

    /**
     * @param ?array<array<string>> $value
     */
    public function setOrder(?array $value = null): self
    {
        $this->order = $value;
        $this->_setField('order');
        return $this;
    }

    /**
     * @return ?int
     */
    public function getLimit(): ?int
    {
        return $this->limit;
    }

    /**
     * @param ?int $value
     */
    public function setLimit(?int $value = null): self
    {
        $this->limit = $value;
        $this->_setField('limit');
        return $this;
    }

    /**
     * @return ?int
     */
    public function getOffset(): ?int
    {
        return $this->offset;
    }

    /**
     * @param ?int $value
     */
    public function setOffset(?int $value = null): self
    {
        $this->offset = $value;
        $this->_setField('offset');
        return $this;
    }

    /**
     * @return ?array<(
     *    QueryFilterCondition
     *   |QueryFilterOr
     *   |QueryFilterAnd
     * )>
     */
    public function getFilters(): ?array
    {
        return $this->filters;
    }

    /**
     * @param ?array<(
     *    QueryFilterCondition
     *   |QueryFilterOr
     *   |QueryFilterAnd
     * )> $value
     */
    public function setFilters(?array $value = null): self
    {
        $this->filters = $value;
        $this->_setField('filters');
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getUngrouped(): ?bool
    {
        return $this->ungrouped;
    }

    /**
     * @param ?bool $value
     */
    public function setUngrouped(?bool $value = null): self
    {
        $this->ungrouped = $value;
        $this->_setField('ungrouped');
        return $this;
    }

    /**
     * @return ?array<JoinSubquery>
     */
    public function getSubqueryJoins(): ?array
    {
        return $this->subqueryJoins;
    }

    /**
     * @param ?array<JoinSubquery> $value
     */
    public function setSubqueryJoins(?array $value = null): self
    {
        $this->subqueryJoins = $value;
        $this->_setField('subqueryJoins');
        return $this;
    }

    /**
     * @return ?array<array<string>>
     */
    public function getJoinHints(): ?array
    {
        return $this->joinHints;
    }

    /**
     * @param ?array<array<string>> $value
     */
    public function setJoinHints(?array $value = null): self
    {
        $this->joinHints = $value;
        $this->_setField('joinHints');
        return $this;
    }

    /**
     * @return ?string
     */
    public function getTimezone(): ?string
    {
        return $this->timezone;
    }

    /**
     * @param ?string $value
     */
    public function setTimezone(?string $value = null): self
    {
        $this->timezone = $value;
        $this->_setField('timezone');
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
