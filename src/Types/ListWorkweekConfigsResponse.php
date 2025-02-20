<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * The response to a request for a set of `WorkweekConfig` objects. The response contains
 * the requested `WorkweekConfig` objects and might contain a set of `Error` objects if
 * the request resulted in errors.
 */
class ListWorkweekConfigsResponse extends JsonSerializableType
{
    /**
     * @var ?array<WorkweekConfig> $workweekConfigs A page of `WorkweekConfig` results.
     */
    #[JsonProperty('workweek_configs'), ArrayType([WorkweekConfig::class])]
    private ?array $workweekConfigs;

    /**
     * The value supplied in the subsequent request to fetch the next page of
     * `WorkweekConfig` results.
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
     *   workweekConfigs?: ?array<WorkweekConfig>,
     *   cursor?: ?string,
     *   errors?: ?array<Error>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->workweekConfigs = $values['workweekConfigs'] ?? null;
        $this->cursor = $values['cursor'] ?? null;
        $this->errors = $values['errors'] ?? null;
    }

    /**
     * @return ?array<WorkweekConfig>
     */
    public function getWorkweekConfigs(): ?array
    {
        return $this->workweekConfigs;
    }

    /**
     * @param ?array<WorkweekConfig> $value
     */
    public function setWorkweekConfigs(?array $value = null): self
    {
        $this->workweekConfigs = $value;
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
