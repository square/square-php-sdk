<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * A request for a set of `EmployeeWage` objects.
 */
class ListEmployeeWagesRequest implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $employeeId;

    /**
     * @var int|null
     */
    private $limit;

    /**
     * @var string|null
     */
    private $cursor;

    /**
     * Returns Employee Id.
     *
     * Filter the returned wages to only those that are associated with the specified employee.
     */
    public function getEmployeeId(): ?string
    {
        return $this->employeeId;
    }

    /**
     * Sets Employee Id.
     *
     * Filter the returned wages to only those that are associated with the specified employee.
     *
     * @maps employee_id
     */
    public function setEmployeeId(?string $employeeId): void
    {
        $this->employeeId = $employeeId;
    }

    /**
     * Returns Limit.
     *
     * The maximum number of `EmployeeWage` results to return per page. The number can range between
     * 1 and 200. The default is 200.
     */
    public function getLimit(): ?int
    {
        return $this->limit;
    }

    /**
     * Sets Limit.
     *
     * The maximum number of `EmployeeWage` results to return per page. The number can range between
     * 1 and 200. The default is 200.
     *
     * @maps limit
     */
    public function setLimit(?int $limit): void
    {
        $this->limit = $limit;
    }

    /**
     * Returns Cursor.
     *
     * A pointer to the next page of `EmployeeWage` results to fetch.
     */
    public function getCursor(): ?string
    {
        return $this->cursor;
    }

    /**
     * Sets Cursor.
     *
     * A pointer to the next page of `EmployeeWage` results to fetch.
     *
     * @maps cursor
     */
    public function setCursor(?string $cursor): void
    {
        $this->cursor = $cursor;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->employeeId)) {
            $json['employee_id'] = $this->employeeId;
        }
        if (isset($this->limit)) {
            $json['limit']       = $this->limit;
        }
        if (isset($this->cursor)) {
            $json['cursor']      = $this->cursor;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
