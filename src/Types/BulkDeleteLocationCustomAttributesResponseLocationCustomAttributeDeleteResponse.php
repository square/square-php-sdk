<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Represents an individual delete response in a [BulkDeleteLocationCustomAttributes](api-endpoint:LocationCustomAttributes-BulkDeleteLocationCustomAttributes)
 * request.
 */
class BulkDeleteLocationCustomAttributesResponseLocationCustomAttributeDeleteResponse extends JsonSerializableType
{
    /**
     * @var ?string $locationId The ID of the location associated with the custom attribute.
     */
    #[JsonProperty('location_id')]
    private ?string $locationId;

    /**
     * @var ?array<Error> $errors Errors that occurred while processing the individual LocationCustomAttributeDeleteRequest request
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @param array{
     *   locationId?: ?string,
     *   errors?: ?array<Error>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->locationId = $values['locationId'] ?? null;
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
