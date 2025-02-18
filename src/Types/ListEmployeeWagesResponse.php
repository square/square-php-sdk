<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * The response to a request for a set of `EmployeeWage` objects. The response contains
 * a set of `EmployeeWage` objects.
 */
class ListEmployeeWagesResponse extends JsonSerializableType
{
    /**
     * @var ?array<EmployeeWage> $employeeWages A page of `EmployeeWage` results.
     */
    #[JsonProperty('employee_wages'), ArrayType([EmployeeWage::class])]
    private ?array $employeeWages;

    /**
     * The value supplied in the subsequent request to fetch the next page
     * of `EmployeeWage` results.
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
     *   employeeWages?: ?array<EmployeeWage>,
     *   cursor?: ?string,
     *   errors?: ?array<Error>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->employeeWages = $values['employeeWages'] ?? null;
        $this->cursor = $values['cursor'] ?? null;
        $this->errors = $values['errors'] ?? null;
    }

    /**
     * @return ?array<EmployeeWage>
     */
    public function getEmployeeWages(): ?array
    {
        return $this->employeeWages;
    }

    /**
     * @param ?array<EmployeeWage> $value
     */
    public function setEmployeeWages(?array $value = null): self
    {
        $this->employeeWages = $value;
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
