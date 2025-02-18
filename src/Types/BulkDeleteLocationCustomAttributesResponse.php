<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Represents a [BulkDeleteLocationCustomAttributes](api-endpoint:LocationCustomAttributes-BulkDeleteLocationCustomAttributes) response,
 * which contains a map of responses that each corresponds to an individual delete request.
 */
class BulkDeleteLocationCustomAttributesResponse extends JsonSerializableType
{
    /**
     * A map of responses that correspond to individual delete requests. Each response has the
     * same key as the corresponding request.
     *
     * @var array<string, BulkDeleteLocationCustomAttributesResponseLocationCustomAttributeDeleteResponse> $values
     */
    #[JsonProperty('values'), ArrayType(['string' => BulkDeleteLocationCustomAttributesResponseLocationCustomAttributeDeleteResponse::class])]
    private array $values;

    /**
     * @var ?array<Error> $errors Any errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @param array{
     *   values: array<string, BulkDeleteLocationCustomAttributesResponseLocationCustomAttributeDeleteResponse>,
     *   errors?: ?array<Error>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->values = $values['values'];
        $this->errors = $values['errors'] ?? null;
    }

    /**
     * @return array<string, BulkDeleteLocationCustomAttributesResponseLocationCustomAttributeDeleteResponse>
     */
    public function getValues(): array
    {
        return $this->values;
    }

    /**
     * @param array<string, BulkDeleteLocationCustomAttributesResponseLocationCustomAttributeDeleteResponse> $value
     */
    public function setValues(array $value): self
    {
        $this->values = $value;
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
