<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Represents an [UpsertLocationCustomAttribute](api-endpoint:LocationCustomAttributes-UpsertLocationCustomAttribute) response.
 * Either `custom_attribute_definition` or `errors` is present in the response.
 */
class UpsertLocationCustomAttributeResponse extends JsonSerializableType
{
    /**
     * @var ?CustomAttribute $customAttribute The new or updated custom attribute.
     */
    #[JsonProperty('custom_attribute')]
    private ?CustomAttribute $customAttribute;

    /**
     * @var ?array<Error> $errors Any errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @param array{
     *   customAttribute?: ?CustomAttribute,
     *   errors?: ?array<Error>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->customAttribute = $values['customAttribute'] ?? null;
        $this->errors = $values['errors'] ?? null;
    }

    /**
     * @return ?CustomAttribute
     */
    public function getCustomAttribute(): ?CustomAttribute
    {
        return $this->customAttribute;
    }

    /**
     * @param ?CustomAttribute $value
     */
    public function setCustomAttribute(?CustomAttribute $value = null): self
    {
        $this->customAttribute = $value;
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
