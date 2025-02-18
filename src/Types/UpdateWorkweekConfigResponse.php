<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * The response to a request to update a `WorkweekConfig` object. The response contains
 * the updated `WorkweekConfig` object and might contain a set of `Error` objects if
 * the request resulted in errors.
 */
class UpdateWorkweekConfigResponse extends JsonSerializableType
{
    /**
     * @var ?WorkweekConfig $workweekConfig The response object.
     */
    #[JsonProperty('workweek_config')]
    private ?WorkweekConfig $workweekConfig;

    /**
     * @var ?array<Error> $errors Any errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @param array{
     *   workweekConfig?: ?WorkweekConfig,
     *   errors?: ?array<Error>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->workweekConfig = $values['workweekConfig'] ?? null;
        $this->errors = $values['errors'] ?? null;
    }

    /**
     * @return ?WorkweekConfig
     */
    public function getWorkweekConfig(): ?WorkweekConfig
    {
        return $this->workweekConfig;
    }

    /**
     * @param ?WorkweekConfig $value
     */
    public function setWorkweekConfig(?WorkweekConfig $value = null): self
    {
        $this->workweekConfig = $value;
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
