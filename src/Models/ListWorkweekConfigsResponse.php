<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * The response to a request for a set of `WorkweekConfig` objects. Contains
 * the requested `WorkweekConfig` objects. May contain a set of `Error` objects if
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
     * A page of Employee Wage results.
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
     * A page of Employee Wage results.
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
     * Value supplied in the subsequent request to fetch the next page of
     * Employee Wage results.
     */
    public function getCursor(): ?string
    {
        return $this->cursor;
    }

    /**
     * Sets Cursor.
     *
     * Value supplied in the subsequent request to fetch the next page of
     * Employee Wage results.
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
        $json['workweek_configs'] = $this->workweekConfigs;
        $json['cursor']          = $this->cursor;
        $json['errors']          = $this->errors;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
