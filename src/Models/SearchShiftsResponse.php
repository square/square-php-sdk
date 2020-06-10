<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * The response to a request for `Shift` objects. Contains
 * the requested `Shift` objects. May contain a set of `Error` objects if
 * the request resulted in errors.
 */
class SearchShiftsResponse implements \JsonSerializable
{
    /**
     * @var Shift[]|null
     */
    private $shifts;

    /**
     * @var string|null
     */
    private $cursor;

    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * Returns Shifts.
     *
     * Shifts
     *
     * @return Shift[]|null
     */
    public function getShifts(): ?array
    {
        return $this->shifts;
    }

    /**
     * Sets Shifts.
     *
     * Shifts
     *
     * @maps shifts
     *
     * @param Shift[]|null $shifts
     */
    public function setShifts(?array $shifts): void
    {
        $this->shifts = $shifts;
    }

    /**
     * Returns Cursor.
     *
     * Opaque cursor for fetching the next page.
     */
    public function getCursor(): ?string
    {
        return $this->cursor;
    }

    /**
     * Sets Cursor.
     *
     * Opaque cursor for fetching the next page.
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
        $json['shifts'] = $this->shifts;
        $json['cursor'] = $this->cursor;
        $json['errors'] = $this->errors;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
