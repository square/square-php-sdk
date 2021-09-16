<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * The response to the request to create a `BreakType`. The response contains
 * the created `BreakType` object and might contain a set of `Error` objects if
 * the request resulted in errors.
 */
class CreateBreakTypeResponse implements \JsonSerializable
{
    /**
     * @var BreakType|null
     */
    private $breakType;

    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * Returns Break Type.
     *
     * A defined break template that sets an expectation for possible `Break`
     * instances on a `Shift`.
     */
    public function getBreakType(): ?BreakType
    {
        return $this->breakType;
    }

    /**
     * Sets Break Type.
     *
     * A defined break template that sets an expectation for possible `Break`
     * instances on a `Shift`.
     *
     * @maps break_type
     */
    public function setBreakType(?BreakType $breakType): void
    {
        $this->breakType = $breakType;
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
        if (isset($this->breakType)) {
            $json['break_type'] = $this->breakType;
        }
        if (isset($this->errors)) {
            $json['errors']     = $this->errors;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
