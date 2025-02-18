<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * The response to a request for a set of `BreakType` objects. The response contains
 * the requested `BreakType` objects and might contain a set of `Error` objects if
 * the request resulted in errors.
 */
class ListBreakTypesResponse extends JsonSerializableType
{
    /**
     * @var ?array<BreakType> $breakTypes  A page of `BreakType` results.
     */
    #[JsonProperty('break_types'), ArrayType([BreakType::class])]
    private ?array $breakTypes;

    /**
     * The value supplied in the subsequent request to fetch the next page
     * of `BreakType` results.
     *
     * @var ?string $cursor
     */
    #[JsonProperty('cursor')]
    private ?string $cursor;

    /**
     * @var ?array<Error> $errors Any errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @param array{
     *   breakTypes?: ?array<BreakType>,
     *   cursor?: ?string,
     *   errors?: ?array<Error>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->breakTypes = $values['breakTypes'] ?? null;
        $this->cursor = $values['cursor'] ?? null;
        $this->errors = $values['errors'] ?? null;
    }

    /**
     * @return ?array<BreakType>
     */
    public function getBreakTypes(): ?array
    {
        return $this->breakTypes;
    }

    /**
     * @param ?array<BreakType> $value
     */
    public function setBreakTypes(?array $value = null): self
    {
        $this->breakTypes = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCursor(): ?string
    {
        return $this->cursor;
    }

    /**
     * @param ?string $value
     */
    public function setCursor(?string $value = null): self
    {
        $this->cursor = $value;
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
