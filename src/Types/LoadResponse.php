<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\Union;
use Square\Core\Types\ArrayType;

class LoadResponse extends JsonSerializableType
{
    /**
     * @var ?string $dataSource
     */
    #[JsonProperty('dataSource')]
    private ?string $dataSource;

    /**
     * @var ?LoadResultAnnotation $annotation
     */
    #[JsonProperty('annotation')]
    private ?LoadResultAnnotation $annotation;

    /**
     * @var (
     *    array<array<string, mixed>>
     *   |LoadResultDataCompact
     *   |LoadResultDataColumnar
     * )|null $data
     */
    #[JsonProperty('data'), Union([['string' => 'mixed']], LoadResultDataCompact::class, LoadResultDataColumnar::class, 'null')]
    private array|LoadResultDataCompact|LoadResultDataColumnar|null $data;

    /**
     * @var ?string $lastRefreshTime
     */
    #[JsonProperty('lastRefreshTime')]
    private ?string $lastRefreshTime;

    /**
     * @var ?array<string, mixed> $query
     */
    #[JsonProperty('query'), ArrayType(['string' => 'mixed'])]
    private ?array $query;

    /**
     * @var ?bool $slowQuery
     */
    #[JsonProperty('slowQuery')]
    private ?bool $slowQuery;

    /**
     * @var ?bool $external
     */
    #[JsonProperty('external')]
    private ?bool $external;

    /**
     * @var ?string $dbType
     */
    #[JsonProperty('dbType')]
    private ?string $dbType;

    /**
     * @var ?array<array<string, mixed>> $refreshKeyValues
     */
    #[JsonProperty('refreshKeyValues'), ArrayType([['string' => 'mixed']])]
    private ?array $refreshKeyValues;

    /**
     * @var ?array<string, mixed> $pivotQuery
     */
    #[JsonProperty('pivotQuery'), ArrayType(['string' => 'mixed'])]
    private ?array $pivotQuery;

    /**
     * @var ?string $queryType
     */
    #[JsonProperty('queryType')]
    private ?string $queryType;

    /**
     * @param array{
     *   dataSource?: ?string,
     *   annotation?: ?LoadResultAnnotation,
     *   data?: (
     *    array<array<string, mixed>>
     *   |LoadResultDataCompact
     *   |LoadResultDataColumnar
     * )|null,
     *   lastRefreshTime?: ?string,
     *   query?: ?array<string, mixed>,
     *   slowQuery?: ?bool,
     *   external?: ?bool,
     *   dbType?: ?string,
     *   refreshKeyValues?: ?array<array<string, mixed>>,
     *   pivotQuery?: ?array<string, mixed>,
     *   queryType?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->dataSource = $values['dataSource'] ?? null;
        $this->annotation = $values['annotation'] ?? null;
        $this->data = $values['data'] ?? null;
        $this->lastRefreshTime = $values['lastRefreshTime'] ?? null;
        $this->query = $values['query'] ?? null;
        $this->slowQuery = $values['slowQuery'] ?? null;
        $this->external = $values['external'] ?? null;
        $this->dbType = $values['dbType'] ?? null;
        $this->refreshKeyValues = $values['refreshKeyValues'] ?? null;
        $this->pivotQuery = $values['pivotQuery'] ?? null;
        $this->queryType = $values['queryType'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getDataSource(): ?string
    {
        return $this->dataSource;
    }

    /**
     * @param ?string $value
     */
    public function setDataSource(?string $value = null): self
    {
        $this->dataSource = $value;
        $this->_setField('dataSource');
        return $this;
    }

    /**
     * @return ?LoadResultAnnotation
     */
    public function getAnnotation(): ?LoadResultAnnotation
    {
        return $this->annotation;
    }

    /**
     * @param ?LoadResultAnnotation $value
     */
    public function setAnnotation(?LoadResultAnnotation $value = null): self
    {
        $this->annotation = $value;
        $this->_setField('annotation');
        return $this;
    }

    /**
     * @return (
     *    array<array<string, mixed>>
     *   |LoadResultDataCompact
     *   |LoadResultDataColumnar
     * )|null
     */
    public function getData(): array|LoadResultDataCompact|LoadResultDataColumnar|null
    {
        return $this->data;
    }

    /**
     * @param (
     *    array<array<string, mixed>>
     *   |LoadResultDataCompact
     *   |LoadResultDataColumnar
     * )|null $value
     */
    public function setData(array|LoadResultDataCompact|LoadResultDataColumnar|null $value = null): self
    {
        $this->data = $value;
        $this->_setField('data');
        return $this;
    }

    /**
     * @return ?string
     */
    public function getLastRefreshTime(): ?string
    {
        return $this->lastRefreshTime;
    }

    /**
     * @param ?string $value
     */
    public function setLastRefreshTime(?string $value = null): self
    {
        $this->lastRefreshTime = $value;
        $this->_setField('lastRefreshTime');
        return $this;
    }

    /**
     * @return ?array<string, mixed>
     */
    public function getQuery(): ?array
    {
        return $this->query;
    }

    /**
     * @param ?array<string, mixed> $value
     */
    public function setQuery(?array $value = null): self
    {
        $this->query = $value;
        $this->_setField('query');
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getSlowQuery(): ?bool
    {
        return $this->slowQuery;
    }

    /**
     * @param ?bool $value
     */
    public function setSlowQuery(?bool $value = null): self
    {
        $this->slowQuery = $value;
        $this->_setField('slowQuery');
        return $this;
    }

    /**
     * @return ?bool
     */
    public function getExternal(): ?bool
    {
        return $this->external;
    }

    /**
     * @param ?bool $value
     */
    public function setExternal(?bool $value = null): self
    {
        $this->external = $value;
        $this->_setField('external');
        return $this;
    }

    /**
     * @return ?string
     */
    public function getDbType(): ?string
    {
        return $this->dbType;
    }

    /**
     * @param ?string $value
     */
    public function setDbType(?string $value = null): self
    {
        $this->dbType = $value;
        $this->_setField('dbType');
        return $this;
    }

    /**
     * @return ?array<array<string, mixed>>
     */
    public function getRefreshKeyValues(): ?array
    {
        return $this->refreshKeyValues;
    }

    /**
     * @param ?array<array<string, mixed>> $value
     */
    public function setRefreshKeyValues(?array $value = null): self
    {
        $this->refreshKeyValues = $value;
        $this->_setField('refreshKeyValues');
        return $this;
    }

    /**
     * @return ?array<string, mixed>
     */
    public function getPivotQuery(): ?array
    {
        return $this->pivotQuery;
    }

    /**
     * @param ?array<string, mixed> $value
     */
    public function setPivotQuery(?array $value = null): self
    {
        $this->pivotQuery = $value;
        $this->_setField('pivotQuery');
        return $this;
    }

    /**
     * @return ?string
     */
    public function getQueryType(): ?string
    {
        return $this->queryType;
    }

    /**
     * @param ?string $value
     */
    public function setQueryType(?string $value = null): self
    {
        $this->queryType = $value;
        $this->_setField('queryType');
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
