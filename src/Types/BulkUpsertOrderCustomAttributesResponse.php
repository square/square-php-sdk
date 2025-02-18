<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Represents a response from a bulk upsert of order custom attributes.
 */
class BulkUpsertOrderCustomAttributesResponse extends JsonSerializableType
{
    /**
     * @var ?array<Error> $errors Any errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @var array<string, UpsertOrderCustomAttributeResponse> $values  A map of responses that correspond to individual upsert operations for custom attributes.
     */
    #[JsonProperty('values'), ArrayType(['string' => UpsertOrderCustomAttributeResponse::class])]
    private array $values;

    /**
     * @param array{
     *   values: array<string, UpsertOrderCustomAttributeResponse>,
     *   errors?: ?array<Error>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->errors = $values['errors'] ?? null;
        $this->values = $values['values'];
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
     * @return array<string, UpsertOrderCustomAttributeResponse>
     */
    public function getValues(): array
    {
        return $this->values;
    }

    /**
     * @param array<string, UpsertOrderCustomAttributeResponse> $value
     */
    public function setValues(array $value): self
    {
        $this->values = $value;
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
