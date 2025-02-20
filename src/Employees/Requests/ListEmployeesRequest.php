<?php

namespace Square\Employees\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\EmployeeStatus;

class ListEmployeesRequest extends JsonSerializableType
{
    /**
     * @var ?string $locationId
     */
    private ?string $locationId;

    /**
     * @var ?value-of<EmployeeStatus> $status Specifies the EmployeeStatus to filter the employee by.
     */
    private ?string $status;

    /**
     * @var ?int $limit The number of employees to be returned on each page.
     */
    private ?int $limit;

    /**
     * @var ?string $cursor The token required to retrieve the specified page of results.
     */
    private ?string $cursor;

    /**
     * @param array{
     *   locationId?: ?string,
     *   status?: ?value-of<EmployeeStatus>,
     *   limit?: ?int,
     *   cursor?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->locationId = $values['locationId'] ?? null;
        $this->status = $values['status'] ?? null;
        $this->limit = $values['limit'] ?? null;
        $this->cursor = $values['cursor'] ?? null;
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
     * @return ?value-of<EmployeeStatus>
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param ?value-of<EmployeeStatus> $value
     */
    public function setStatus(?string $value = null): self
    {
        $this->status = $value;
        return $this;
    }

    /**
     * @return ?int
     */
    public function getLimit(): ?int
    {
        return $this->limit;
    }

    /**
     * @param ?int $value
     */
    public function setLimit(?int $value = null): self
    {
        $this->limit = $value;
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
}
