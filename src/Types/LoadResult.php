<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\Union;
use Square\Core\Types\ArrayType;

class LoadResult extends JsonSerializableType
{
    /**
     * @var ?string $dataSource
     */
    #[JsonProperty('dataSource')]
    private ?string $dataSource;

    /**
     * @var LoadResultAnnotation $annotation
     */
    #[JsonProperty('annotation')]
    private LoadResultAnnotation $annotation;

    /**
     * @var (
     *    array<array<string, mixed>>
     *   |LoadResultDataCompact
     *   |LoadResultDataColumnar
     * ) $data
     */
    #[JsonProperty('data'), Union([['string' => 'mixed']], LoadResultDataCompact::class, LoadResultDataColumnar::class)]
    private array|LoadResultDataCompact|LoadResultDataColumnar $data;

    /**
     * @var ?array<array<string, mixed>> $refreshKeyValues
     */
    #[JsonProperty('refreshKeyValues'), ArrayType([['string' => 'mixed']])]
    private ?array $refreshKeyValues;

    /**
     * @var ?string $lastRefreshTime
     */
    #[JsonProperty('lastRefreshTime')]
    private ?string $lastRefreshTime;

    /**
     * @param array{
     *   annotation: LoadResultAnnotation,
     *   data: (
     *    array<array<string, mixed>>
     *   |LoadResultDataCompact
     *   |LoadResultDataColumnar
     * ),
     *   dataSource?: ?string,
     *   refreshKeyValues?: ?array<array<string, mixed>>,
     *   lastRefreshTime?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->dataSource = $values['dataSource'] ?? null;
        $this->annotation = $values['annotation'];
        $this->data = $values['data'];
        $this->refreshKeyValues = $values['refreshKeyValues'] ?? null;
        $this->lastRefreshTime = $values['lastRefreshTime'] ?? null;
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
     * @return LoadResultAnnotation
     */
    public function getAnnotation(): LoadResultAnnotation
    {
        return $this->annotation;
    }

    /**
     * @param LoadResultAnnotation $value
     */
    public function setAnnotation(LoadResultAnnotation $value): self
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
     * )
     */
    public function getData(): array|LoadResultDataCompact|LoadResultDataColumnar
    {
        return $this->data;
    }

    /**
     * @param (
     *    array<array<string, mixed>>
     *   |LoadResultDataCompact
     *   |LoadResultDataColumnar
     * ) $value
     */
    public function setData(array|LoadResultDataCompact|LoadResultDataColumnar $value): self
    {
        $this->data = $value;
        $this->_setField('data');
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
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
