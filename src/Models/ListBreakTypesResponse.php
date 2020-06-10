<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * The response to a request for a set of `BreakTypes`. Contains
 * the requested `BreakType` objects. May contain a set of `Error` objects if
 * the request resulted in errors.
 */
class ListBreakTypesResponse implements \JsonSerializable
{
    /**
     * @var BreakType[]|null
     */
    private $breakTypes;

    /**
     * @var string|null
     */
    private $cursor;

    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * Returns Break Types.
     *
     * A page of `BreakType` results.
     *
     * @return BreakType[]|null
     */
    public function getBreakTypes(): ?array
    {
        return $this->breakTypes;
    }

    /**
     * Sets Break Types.
     *
     * A page of `BreakType` results.
     *
     * @maps break_types
     *
     * @param BreakType[]|null $breakTypes
     */
    public function setBreakTypes(?array $breakTypes): void
    {
        $this->breakTypes = $breakTypes;
    }

    /**
     * Returns Cursor.
     *
     * Value supplied in the subsequent request to fetch the next next page
     * of Break Type results.
     */
    public function getCursor(): ?string
    {
        return $this->cursor;
    }

    /**
     * Sets Cursor.
     *
     * Value supplied in the subsequent request to fetch the next next page
     * of Break Type results.
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
        $json['break_types'] = $this->breakTypes;
        $json['cursor']     = $this->cursor;
        $json['errors']     = $this->errors;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
