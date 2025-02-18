<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Represents a [BulkUpsertLocationCustomAttributes](api-endpoint:LocationCustomAttributes-BulkUpsertLocationCustomAttributes) response,
 * which contains a map of responses that each corresponds to an individual upsert request.
 */
class BulkUpsertLocationCustomAttributesResponse extends JsonSerializableType
{
    /**
     * A map of responses that correspond to individual upsert requests. Each response has the
     * same ID as the corresponding request and contains either a `location_id` and `custom_attribute` or an `errors` field.
     *
     * @var ?array<string, BulkUpsertLocationCustomAttributesResponseLocationCustomAttributeUpsertResponse> $values
     */
    #[JsonProperty('values'), ArrayType(['string' => BulkUpsertLocationCustomAttributesResponseLocationCustomAttributeUpsertResponse::class])]
    private ?array $values;

    /**
     * @var ?array<Error> $errors Any errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @param array{
     *   values?: ?array<string, BulkUpsertLocationCustomAttributesResponseLocationCustomAttributeUpsertResponse>,
     *   errors?: ?array<Error>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->values = $values['values'] ?? null;
        $this->errors = $values['errors'] ?? null;
    }

    /**
     * @return ?array<string, BulkUpsertLocationCustomAttributesResponseLocationCustomAttributeUpsertResponse>
     */
    public function getValues(): ?array
    {
        return $this->values;
    }

    /**
     * @param ?array<string, BulkUpsertLocationCustomAttributesResponseLocationCustomAttributeUpsertResponse> $value
     */
    public function setValues(?array $value = null): self
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
