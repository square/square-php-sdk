<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Options to include related resources of the requested `CatalogObject`s. Related resources will be included in
 * `IncludedResources` in the response.
 */
class IncludeOptions extends JsonSerializableType
{
    /**
     * Resources to include in the response.
     * See [IncludeType](#type-includetype) for possible values
     *
     * @var ?array<value-of<IncludeType>> $include
     */
    #[JsonProperty('include'), ArrayType(['string'])]
    private ?array $include;

    /**
     * @param array{
     *   include?: ?array<value-of<IncludeType>>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->include = $values['include'] ?? null;
    }

    /**
     * @return ?array<value-of<IncludeType>>
     */
    public function getInclude(): ?array
    {
        return $this->include;
    }

    /**
     * @param ?array<value-of<IncludeType>> $value
     */
    public function setInclude(?array $value = null): self
    {
        $this->include = $value;
        $this->_setField('include');
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
