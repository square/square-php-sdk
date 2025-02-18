<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * A filter to select resources based on an exact field value. For any given
 * value, the value can only be in one property. Depending on the field, either
 * all properties can be set or only a subset will be available.
 *
 * Refer to the documentation of the field.
 */
class FilterValue extends JsonSerializableType
{
    /**
     * @var ?array<string> $all A list of terms that must be present on the field of the resource.
     */
    #[JsonProperty('all'), ArrayType(['string'])]
    private ?array $all;

    /**
     * A list of terms where at least one of them must be present on the
     * field of the resource.
     *
     * @var ?array<string> $any
     */
    #[JsonProperty('any'), ArrayType(['string'])]
    private ?array $any;

    /**
     * @var ?array<string> $none A list of terms that must not be present on the field the resource
     */
    #[JsonProperty('none'), ArrayType(['string'])]
    private ?array $none;

    /**
     * @param array{
     *   all?: ?array<string>,
     *   any?: ?array<string>,
     *   none?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->all = $values['all'] ?? null;
        $this->any = $values['any'] ?? null;
        $this->none = $values['none'] ?? null;
    }

    /**
     * @return ?array<string>
     */
    public function getAll(): ?array
    {
        return $this->all;
    }

    /**
     * @param ?array<string> $value
     */
    public function setAll(?array $value = null): self
    {
        $this->all = $value;
        return $this;
    }

    /**
     * @return ?array<string>
     */
    public function getAny(): ?array
    {
        return $this->any;
    }

    /**
     * @param ?array<string> $value
     */
    public function setAny(?array $value = null): self
    {
        $this->any = $value;
        return $this;
    }

    /**
     * @return ?array<string>
     */
    public function getNone(): ?array
    {
        return $this->none;
    }

    /**
     * @param ?array<string> $value
     */
    public function setNone(?array $value = null): self
    {
        $this->none = $value;
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
