<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class RevokeTokenResponse extends JsonSerializableType
{
    /**
     * @var ?bool $success If the request is successful, this is `true`.
     */
    #[JsonProperty('success')]
    private ?bool $success;

    /**
     * @var ?array<Error> $errors Any errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @param array{
     *   success?: ?bool,
     *   errors?: ?array<Error>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->success = $values['success'] ?? null;
        $this->errors = $values['errors'] ?? null;
    }

    /**
     * @return ?bool
     */
    public function getSuccess(): ?bool
    {
        return $this->success;
    }

    /**
     * @param ?bool $value
     */
    public function setSuccess(?bool $value = null): self
    {
        $this->success = $value;
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
