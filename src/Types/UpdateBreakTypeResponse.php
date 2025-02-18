<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * A response to a request to update a `BreakType`. The response contains
 * the requested `BreakType` objects and might contain a set of `Error` objects if
 * the request resulted in errors.
 */
class UpdateBreakTypeResponse extends JsonSerializableType
{
    /**
     * @var ?BreakType $breakType The response object.
     */
    #[JsonProperty('break_type')]
    private ?BreakType $breakType;

    /**
     * @var ?array<Error> $errors Any errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @param array{
     *   breakType?: ?BreakType,
     *   errors?: ?array<Error>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->breakType = $values['breakType'] ?? null;
        $this->errors = $values['errors'] ?? null;
    }

    /**
     * @return ?BreakType
     */
    public function getBreakType(): ?BreakType
    {
        return $this->breakType;
    }

    /**
     * @param ?BreakType $value
     */
    public function setBreakType(?BreakType $value = null): self
    {
        $this->breakType = $value;
        return $this;
    }

    /**
     * @return ?array<Error>
     */
    public function getErrors(): ?array
    {
        return $this->errors;
    }

    /**
     * @param ?array<Error> $value
     */
    public function setErrors(?array $value = null): self
    {
        $this->errors = $value;
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
