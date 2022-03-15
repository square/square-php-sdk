<?php

declare(strict_types=1);

namespace Square\Models;

use stdClass;

/**
 * Represents a generic time range. The start and end values are
 * represented in RFC 3339 format. Time ranges are customized to be
 * inclusive or exclusive based on the needs of a particular endpoint.
 * Refer to the relevant endpoint-specific documentation to determine
 * how time ranges are handled.
 */
class TimeRange implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $startAt;

    /**
     * @var string|null
     */
    private $endAt;

    /**
     * Returns Start At.
     *
     * A datetime value in RFC 3339 format indicating when the time range
     * starts.
     */
    public function getStartAt(): ?string
    {
        return $this->startAt;
    }

    /**
     * Sets Start At.
     *
     * A datetime value in RFC 3339 format indicating when the time range
     * starts.
     *
     * @maps start_at
     */
    public function setStartAt(?string $startAt): void
    {
        $this->startAt = $startAt;
    }

    /**
     * Returns End At.
     *
     * A datetime value in RFC 3339 format indicating when the time range
     * ends.
     */
    public function getEndAt(): ?string
    {
        return $this->endAt;
    }

    /**
     * Sets End At.
     *
     * A datetime value in RFC 3339 format indicating when the time range
     * ends.
     *
     * @maps end_at
     */
    public function setEndAt(?string $endAt): void
    {
        $this->endAt = $endAt;
    }

    /**
     * Encode this object to JSON
     *
     * @param bool $asArrayWhenEmpty Whether to serialize this model as an array whenever no fields
     *        are set. (default: false)
     *
     * @return array|stdClass
     */
    #[\ReturnTypeWillChange] // @phan-suppress-current-line PhanUndeclaredClassAttribute for (php < 8.1)
    public function jsonSerialize(bool $asArrayWhenEmpty = false)
    {
        $json = [];
        if (isset($this->startAt)) {
            $json['start_at'] = $this->startAt;
        }
        if (isset($this->endAt)) {
            $json['end_at']   = $this->endAt;
        }
        $json = array_filter($json, function ($val) {
            return $val !== null;
        });

        return (!$asArrayWhenEmpty && empty($json)) ? new stdClass() : $json;
    }
}
