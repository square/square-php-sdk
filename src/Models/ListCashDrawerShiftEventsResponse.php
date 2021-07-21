<?php

declare(strict_types=1);

namespace Square\Models;

class ListCashDrawerShiftEventsResponse implements \JsonSerializable
{
    /**
     * @var CashDrawerShiftEvent[]|null
     */
    private $events;

    /**
     * @var string|null
     */
    private $cursor;

    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * Returns Events.
     *
     * All of the events (payments, refunds, etc.) for a cash drawer during
     * the shift.
     *
     * @return CashDrawerShiftEvent[]|null
     */
    public function getEvents(): ?array
    {
        return $this->events;
    }

    /**
     * Sets Events.
     *
     * All of the events (payments, refunds, etc.) for a cash drawer during
     * the shift.
     *
     * @maps events
     *
     * @param CashDrawerShiftEvent[]|null $events
     */
    public function setEvents(?array $events): void
    {
        $this->events = $events;
    }

    /**
     * Returns Cursor.
     *
     * Opaque cursor for fetching the next page. Cursor is not present in
     * the last page of results.
     */
    public function getCursor(): ?string
    {
        return $this->cursor;
    }

    /**
     * Sets Cursor.
     *
     * Opaque cursor for fetching the next page. Cursor is not present in
     * the last page of results.
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
        if (isset($this->events)) {
            $json['events'] = $this->events;
        }
        if (isset($this->cursor)) {
            $json['cursor'] = $this->cursor;
        }
        if (isset($this->errors)) {
            $json['errors'] = $this->errors;
        }

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
