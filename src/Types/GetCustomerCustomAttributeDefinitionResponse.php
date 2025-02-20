<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Represents a [RetrieveCustomerCustomAttributeDefinition](api-endpoint:CustomerCustomAttributes-RetrieveCustomerCustomAttributeDefinition) response.
 * Either `custom_attribute_definition` or `errors` is present in the response.
 */
class GetCustomerCustomAttributeDefinitionResponse extends JsonSerializableType
{
    /**
     * @var ?CustomAttributeDefinition $customAttributeDefinition The retrieved custom attribute definition.
     */
    #[JsonProperty('custom_attribute_definition')]
    private ?CustomAttributeDefinition $customAttributeDefinition;

    /**
     * @var ?array<Error> $errors Any errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @param array{
     *   customAttributeDefinition?: ?CustomAttributeDefinition,
     *   errors?: ?array<Error>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->customAttributeDefinition = $values['customAttributeDefinition'] ?? null;
        $this->errors = $values['errors'] ?? null;
    }

    /**
     * @return ?CustomAttributeDefinition
     */
    public function getCustomAttributeDefinition(): ?CustomAttributeDefinition
    {
        return $this->customAttributeDefinition;
    }

    /**
     * @param ?CustomAttributeDefinition $value
     */
    public function setCustomAttributeDefinition(?CustomAttributeDefinition $value = null): self
    {
        $this->customAttributeDefinition = $value;
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
