<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * The query filter to return the search result whose searchable attribute values contain all of the specified keywords or tokens, independent of the token order or case.
 */
class CatalogQueryText extends JsonSerializableType
{
    /**
     * @var array<string> $keywords A list of 1, 2, or 3 search keywords. Keywords with fewer than 3 alphanumeric characters are ignored.
     */
    #[JsonProperty('keywords'), ArrayType(['string'])]
    private array $keywords;

    /**
     * @param array{
     *   keywords: array<string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->keywords = $values['keywords'];
    }

    /**
     * @return array<string>
     */
    public function getKeywords(): array
    {
        return $this->keywords;
    }

    /**
     * @param array<string> $value
     */
    public function setKeywords(array $value): self
    {
        $this->keywords = $value;
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
