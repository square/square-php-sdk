<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * The response to a request to update a `WorkweekConfig` object. The response contains
 * the updated `WorkweekConfig` object and might contain a set of `Error` objects if
 * the request resulted in errors.
 */
class UpdateWorkweekConfigResponse implements \JsonSerializable
{
    /**
     * @var WorkweekConfig|null
     */
    private $workweekConfig;

    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * Returns Workweek Config.
     *
     * Sets the day of the week and hour of the day that a business starts a
     * workweek. This is used to calculate overtime pay.
     */
    public function getWorkweekConfig(): ?WorkweekConfig
    {
        return $this->workweekConfig;
    }

    /**
     * Sets Workweek Config.
     *
     * Sets the day of the week and hour of the day that a business starts a
     * workweek. This is used to calculate overtime pay.
     *
     * @maps workweek_config
     */
    public function setWorkweekConfig(?WorkweekConfig $workweekConfig): void
    {
        $this->workweekConfig = $workweekConfig;
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
        if (isset($this->workweekConfig)) {
            $json['workweek_config'] = $this->workweekConfig;
        }
        if (isset($this->errors)) {
            $json['errors']          = $this->errors;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
