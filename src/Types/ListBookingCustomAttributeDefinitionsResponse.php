<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Represents a [ListBookingCustomAttributeDefinitions](api-endpoint:BookingCustomAttributes-ListBookingCustomAttributeDefinitions) response.
 * Either `custom_attribute_definitions`, an empty object, or `errors` is present in the response.
 * If additional results are available, the `cursor` field is also present along with `custom_attribute_definitions`.
 */
class ListBookingCustomAttributeDefinitionsResponse extends JsonSerializableType
{
    /**
     * The retrieved custom attribute definitions. If no custom attribute definitions are found,
     * Square returns an empty object (`{}`).
     *
     * @var ?array<CustomAttributeDefinition> $customAttributeDefinitions
     */
    #[JsonProperty('custom_attribute_definitions'), ArrayType([CustomAttributeDefinition::class])]
    private ?array $customAttributeDefinitions;

    /**
     * The cursor to provide in your next call to this endpoint to retrieve the next page of
     * results for your original request. This field is present only if the request succeeded and
     * additional results are available. For more information, see [Pagination](https://developer.squareup.com/docs/build-basics/common-api-patterns/pagination).
     *
     * @var ?string $cursor
     */
    #[JsonProperty('cursor')]
    private ?string $cursor;

    /**
     * @var ?array<Error> $errors Any errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @param array{
     *   customAttributeDefinitions?: ?array<CustomAttributeDefinition>,
     *   cursor?: ?string,
     *   errors?: ?array<Error>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->customAttributeDefinitions = $values['customAttributeDefinitions'] ?? null;
        $this->cursor = $values['cursor'] ?? null;
        $this->errors = $values['errors'] ?? null;
    }

    /**
     * @return ?array<CustomAttributeDefinition>
     */
    public function getCustomAttributeDefinitions(): ?array
    {
        return $this->customAttributeDefinitions;
    }

    /**
     * @param ?array<CustomAttributeDefinition> $value
     */
    public function setCustomAttributeDefinitions(?array $value = null): self
    {
        $this->customAttributeDefinitions = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCursor(): ?string
    {
        return $this->cursor;
    }

    /**
     * @param ?string $value
     */
    public function setCursor(?string $value = null): self
    {
        $this->cursor = $value;
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
