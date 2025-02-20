<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class GetEmployeeResponse extends JsonSerializableType
{
    /**
     * @var ?Employee $employee
     */
    #[JsonProperty('employee')]
    private ?Employee $employee;

    /**
     * @var ?array<Error> $errors Any errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @param array{
     *   employee?: ?Employee,
     *   errors?: ?array<Error>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->employee = $values['employee'] ?? null;
        $this->errors = $values['errors'] ?? null;
    }

    /**
     * @return ?Employee
     */
    public function getEmployee(): ?Employee
    {
        return $this->employee;
    }

    /**
     * @param ?Employee $value
     */
    public function setEmployee(?Employee $value = null): self
    {
        $this->employee = $value;
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
