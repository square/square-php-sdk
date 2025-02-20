<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Represents a response from deleting one or more order custom attributes.
 */
class BulkDeleteOrderCustomAttributesResponse extends JsonSerializableType
{
    /**
     * @var ?array<Error> $errors Any errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     *  A map of responses that correspond to individual delete requests. Each response has the same ID
     * as the corresponding request and contains either a `custom_attribute` or an `errors` field.
     *
     * @var array<string, DeleteOrderCustomAttributeResponse> $values
     */
    #[JsonProperty('values'), ArrayType(['string' => DeleteOrderCustomAttributeResponse::class])]
    private array $values;

    /**
     * @param array{
     *   values: array<string, DeleteOrderCustomAttributeResponse>,
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
     * @return array<string, DeleteOrderCustomAttributeResponse>
     */
    public function getValues(): array
    {
        return $this->values;
    }

    /**
     * @param array<string, DeleteOrderCustomAttributeResponse> $value
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
