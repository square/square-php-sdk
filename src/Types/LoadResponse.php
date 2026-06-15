<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class LoadResponse extends JsonSerializableType
{
    /**
     * @var ?array<string, mixed> $pivotQuery
     */
    #[JsonProperty('pivotQuery'), ArrayType(['string' => 'mixed'])]
    private ?array $pivotQuery;

    /**
     * @var ?bool $slowQuery
     */
    #[JsonProperty('slowQuery')]
    private ?bool $slowQuery;

    /**
     * @var ?string $queryType
     */
    #[JsonProperty('queryType')]
    private ?string $queryType;

    /**
     * @var array<LoadResult> $results
     */
    #[JsonProperty('results'), ArrayType([LoadResult::class])]
    private array $results;

    /**
     * @param array{
     *   results: array<LoadResult>,
     *   pivotQuery?: ?array<string, mixed>,
     *   slowQuery?: ?bool,
     *   queryType?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->pivotQuery = $values['pivotQuery'] ?? null;
        $this->slowQuery = $values['slowQuery'] ?? null;
        $this->queryType = $values['queryType'] ?? null;
        $this->results = $values['results'];
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
     * @return array<LoadResult>
     */
    public function getResults(): array
    {
        return $this->results;
    }

    /**
     * @param array<LoadResult> $value
     */
    public function setResults(array $value): self
    {
        $this->results = $value;
        $this->_setField('results');
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
