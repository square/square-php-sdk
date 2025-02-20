<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Represents a response from a retrieve request containing the specified `WageSetting` object or error messages.
 */
class GetWageSettingResponse extends JsonSerializableType
{
    /**
     * @var ?WageSetting $wageSetting The successfully retrieved `WageSetting` object.
     */
    #[JsonProperty('wage_setting')]
    private ?WageSetting $wageSetting;

    /**
     * @var ?array<Error> $errors The errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @param array{
     *   wageSetting?: ?WageSetting,
     *   errors?: ?array<Error>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->wageSetting = $values['wageSetting'] ?? null;
        $this->errors = $values['errors'] ?? null;
    }

    /**
     * @return ?WageSetting
     */
    public function getWageSetting(): ?WageSetting
    {
        return $this->wageSetting;
    }

    /**
     * @param ?WageSetting $value
     */
    public function setWageSetting(?WageSetting $value = null): self
    {
        $this->wageSetting = $value;
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
