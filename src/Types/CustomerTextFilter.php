<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * A filter to select customers based on exact or fuzzy matching of
 * customer attributes against a specified query. Depending on the customer attributes,
 * the filter can be case-sensitive. This filter can be exact or fuzzy, but it cannot be both.
 */
class CustomerTextFilter extends JsonSerializableType
{
    /**
     * @var ?string $exact Use the exact filter to select customers whose attributes match exactly the specified query.
     */
    #[JsonProperty('exact')]
    private ?string $exact;

    /**
     * Use the fuzzy filter to select customers whose attributes match the specified query
     * in a fuzzy manner. When the fuzzy option is used, search queries are tokenized, and then
     * each query token must be matched somewhere in the searched attribute. For single token queries,
     * this is effectively the same behavior as a partial match operation.
     *
     * @var ?string $fuzzy
     */
    #[JsonProperty('fuzzy')]
    private ?string $fuzzy;

    /**
     * @param array{
     *   exact?: ?string,
     *   fuzzy?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->exact = $values['exact'] ?? null;
        $this->fuzzy = $values['fuzzy'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getExact(): ?string
    {
        return $this->exact;
    }

    /**
     * @param ?string $value
     */
    public function setExact(?string $value = null): self
    {
        $this->exact = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getFuzzy(): ?string
    {
        return $this->fuzzy;
    }

    /**
     * @param ?string $value
     */
    public function setFuzzy(?string $value = null): self
    {
        $this->fuzzy = $value;
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
