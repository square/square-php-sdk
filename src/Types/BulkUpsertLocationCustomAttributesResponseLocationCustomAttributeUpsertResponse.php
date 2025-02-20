<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Represents a response for an individual upsert request in a [BulkUpsertLocationCustomAttributes](api-endpoint:LocationCustomAttributes-BulkUpsertLocationCustomAttributes) operation.
 */
class BulkUpsertLocationCustomAttributesResponseLocationCustomAttributeUpsertResponse extends JsonSerializableType
{
    /**
     * @var ?string $locationId The ID of the location associated with the custom attribute.
     */
    #[JsonProperty('location_id')]
    private ?string $locationId;

    /**
     * @var ?CustomAttribute $customAttribute The new or updated custom attribute.
     */
    #[JsonProperty('custom_attribute')]
    private ?CustomAttribute $customAttribute;

    /**
     * @var ?array<Error> $errors Any errors that occurred while processing the individual request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @param array{
     *   locationId?: ?string,
     *   customAttribute?: ?CustomAttribute,
     *   errors?: ?array<Error>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->locationId = $values['locationId'] ?? null;
        $this->customAttribute = $values['customAttribute'] ?? null;
        $this->errors = $values['errors'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getLocationId(): ?string
    {
        return $this->locationId;
    }

    /**
     * @param ?string $value
     */
    public function setLocationId(?string $value = null): self
    {
        $this->locationId = $value;
        return $this;
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
