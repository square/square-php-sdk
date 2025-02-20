<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * A response to a request to get an `EmployeeWage`. The response contains
 * the requested `EmployeeWage` objects and might contain a set of `Error` objects if
 * the request resulted in errors.
 */
class GetEmployeeWageResponse extends JsonSerializableType
{
    /**
     * @var ?EmployeeWage $employeeWage The requested `EmployeeWage` object.
     */
    #[JsonProperty('employee_wage')]
    private ?EmployeeWage $employeeWage;

    /**
     * @var ?array<Error> $errors Any errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @param array{
     *   employeeWage?: ?EmployeeWage,
     *   errors?: ?array<Error>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->employeeWage = $values['employeeWage'] ?? null;
        $this->errors = $values['errors'] ?? null;
    }

    /**
     * @return ?EmployeeWage
     */
    public function getEmployeeWage(): ?EmployeeWage
    {
        return $this->employeeWage;
    }

    /**
     * @param ?EmployeeWage $value
     */
    public function setEmployeeWage(?EmployeeWage $value = null): self
    {
        $this->employeeWage = $value;
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
