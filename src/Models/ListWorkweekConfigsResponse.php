<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * The response to a request for a set of `WorkweekConfig` objects. The response contains
 * the requested `WorkweekConfig` objects and might contain a set of `Error` objects if
 * the request resulted in errors.
 */
class ListWorkweekConfigsResponse implements \JsonSerializable
{
    /**
     * @var WorkweekConfig[]|null
     */
    private $workweekConfigs;

    /**
     * @var string|null
     */
    private $cursor;

    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * Returns Workweek Configs.
     *
     * A page of `EmployeeWage` results.
     *
     * @return WorkweekConfig[]|null
     */
    public function getWorkweekConfigs(): ?array
    {
        return $this->workweekConfigs;
    }

    /**
     * Sets Workweek Configs.
     *
     * A page of `EmployeeWage` results.
     *
     * @maps workweek_configs
     *
     * @param WorkweekConfig[]|null $workweekConfigs
     */
    public function setWorkweekConfigs(?array $workweekConfigs): void
    {
        $this->workweekConfigs = $workweekConfigs;
    }

    /**
     * Returns Cursor.
     *
     * The value supplied in the subsequent request to fetch the next page of
     * `EmployeeWage` results.
     */
    public function getCursor(): ?string
    {
        return $this->cursor;
    }

    /**
     * Sets Cursor.
     *
     * The value supplied in the subsequent request to fetch the next page of
     * `EmployeeWage` results.
     *
     * @maps cursor
     */
    public function setCursor(?string $cursor): void
    {
        $this->cursor = $cursor;
    }

    /**
     * Returns Errors.
     *
     * Any errors that occurred during the request.
     *
     * @return Error[]|null
     */
    public function getErrors(): ?array
    {
        return $this->errors;
    }

    /**
     * Sets Errors.
     *
     * Any errors that occurred during the request.
     *
     * @maps errors
     *
     * @param Error[]|null $errors
     */
    public function setErrors(?array $errors): void
    {
        $this->errors = $errors;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        if (isset($this->workweekConfigs)) {
            $json['workweek_configs'] = $this->workweekConfigs;
        }
        if (isset($this->cursor)) {
            $json['cursor']           = $this->cursor;
        }
        if (isset($this->errors)) {
            $json['errors']           = $this->errors;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
