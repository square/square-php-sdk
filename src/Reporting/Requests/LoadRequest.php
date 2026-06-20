<?php

namespace Square\Reporting\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Types\CacheMode;
use Square\Types\Query;

class LoadRequest extends JsonSerializableType
{
    /**
     * @var ?string $queryType
     */
    #[JsonProperty('queryType')]
    private ?string $queryType;

    /**
     * @var ?value-of<CacheMode> $cache
     */
    #[JsonProperty('cache')]
    private ?string $cache;

    /**
     * @var ?Query $query
     */
    #[JsonProperty('query')]
    private ?Query $query;

    /**
     * @param array{
     *   queryType?: ?string,
     *   cache?: ?value-of<CacheMode>,
     *   query?: ?Query,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->queryType = $values['queryType'] ?? null;
        $this->cache = $values['cache'] ?? null;
        $this->query = $values['query'] ?? null;
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
     * @return ?value-of<CacheMode>
     */
    public function getCache(): ?string
    {
        return $this->cache;
    }

    /**
     * @param ?value-of<CacheMode> $value
     */
    public function setCache(?string $value = null): self
    {
        $this->cache = $value;
        $this->_setField('cache');
        return $this;
    }

    /**
     * @return ?Query
     */
    public function getQuery(): ?Query
    {
        return $this->query;
    }

    /**
     * @param ?Query $value
     */
    public function setQuery(?Query $value = null): self
    {
        $this->query = $value;
        $this->_setField('query');
        return $this;
    }
}
