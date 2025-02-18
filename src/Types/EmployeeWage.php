<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * The hourly wage rate that an employee earns on a `Shift` for doing the job specified by the `title` property of this object. Deprecated at version 2020-08-26. Use [TeamMemberWage](entity:TeamMemberWage).
 */
class EmployeeWage extends JsonSerializableType
{
    /**
     * @var ?string $id The UUID for this object.
     */
    #[JsonProperty('id')]
    private ?string $id;

    /**
     * @var ?string $employeeId The `Employee` that this wage is assigned to.
     */
    #[JsonProperty('employee_id')]
    private ?string $employeeId;

    /**
     * @var ?string $title The job title that this wage relates to.
     */
    #[JsonProperty('title')]
    private ?string $title;

    /**
     * Can be a custom-set hourly wage or the calculated effective hourly
     * wage based on the annual wage and hours worked per week.
     *
     * @var ?Money $hourlyRate
     */
    #[JsonProperty('hourly_rate')]
    private ?Money $hourlyRate;

    /**
     * @param array{
     *   id?: ?string,
     *   employeeId?: ?string,
     *   title?: ?string,
     *   hourlyRate?: ?Money,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->id = $values['id'] ?? null;
        $this->employeeId = $values['employeeId'] ?? null;
        $this->title = $values['title'] ?? null;
        $this->hourlyRate = $values['hourlyRate'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param ?string $value
     */
    public function setId(?string $value = null): self
    {
        $this->id = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getEmployeeId(): ?string
    {
        return $this->employeeId;
    }

    /**
     * @param ?string $value
     */
    public function setEmployeeId(?string $value = null): self
    {
        $this->employeeId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param ?string $value
     */
    public function setTitle(?string $value = null): self
    {
        $this->title = $value;
        return $this;
    }

    /**
     * @return ?Money
     */
    public function getHourlyRate(): ?Money
    {
        return $this->hourlyRate;
    }

    /**
     * @param ?Money $value
     */
    public function setHourlyRate(?Money $value = null): self
    {
        $this->hourlyRate = $value;
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
