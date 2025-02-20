<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * The creation source filter.
 *
 * If one or more creation sources are set, customer profiles are included in,
 * or excluded from, the result if they match at least one of the filter criteria.
 */
class CustomerCreationSourceFilter extends JsonSerializableType
{
    /**
     * The list of creation sources used as filtering criteria.
     * See [CustomerCreationSource](#type-customercreationsource) for possible values
     *
     * @var ?array<value-of<CustomerCreationSource>> $values
     */
    #[JsonProperty('values'), ArrayType(['string'])]
    private ?array $values;

    /**
     * Indicates whether a customer profile matching the filter criteria
     * should be included in the result or excluded from the result.
     *
     * Default: `INCLUDE`.
     * See [CustomerInclusionExclusion](#type-customerinclusionexclusion) for possible values
     *
     * @var ?value-of<CustomerInclusionExclusion> $rule
     */
    #[JsonProperty('rule')]
    private ?string $rule;

    /**
     * @param array{
     *   values?: ?array<value-of<CustomerCreationSource>>,
     *   rule?: ?value-of<CustomerInclusionExclusion>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->values = $values['values'] ?? null;
        $this->rule = $values['rule'] ?? null;
    }

    /**
     * @return ?array<value-of<CustomerCreationSource>>
     */
    public function getValues(): ?array
    {
        return $this->values;
    }

    /**
     * @param ?array<value-of<CustomerCreationSource>> $value
     */
    public function setValues(?array $value = null): self
    {
        $this->values = $value;
        return $this;
    }

    /**
     * @return ?value-of<CustomerInclusionExclusion>
     */
    public function getRule(): ?string
    {
        return $this->rule;
    }

    /**
     * @param ?value-of<CustomerInclusionExclusion> $value
     */
    public function setRule(?string $value = null): self
    {
        $this->rule = $value;
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
