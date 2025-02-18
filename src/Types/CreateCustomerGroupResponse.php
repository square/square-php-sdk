<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Defines the fields that are included in the response body of
 * a request to the [CreateCustomerGroup](api-endpoint:CustomerGroups-CreateCustomerGroup) endpoint.
 *
 * Either `errors` or `group` is present in a given response (never both).
 */
class CreateCustomerGroupResponse extends JsonSerializableType
{
    /**
     * @var ?array<Error> $errors Any errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @var ?CustomerGroup $group The successfully created customer group.
     */
    #[JsonProperty('group')]
    private ?CustomerGroup $group;

    /**
     * @param array{
     *   errors?: ?array<Error>,
     *   group?: ?CustomerGroup,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->errors = $values['errors'] ?? null;
        $this->group = $values['group'] ?? null;
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
     * @return ?CustomerGroup
     */
    public function getGroup(): ?CustomerGroup
    {
        return $this->group;
    }

    /**
     * @param ?CustomerGroup $value
     */
    public function setGroup(?CustomerGroup $value = null): self
    {
        $this->group = $value;
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
