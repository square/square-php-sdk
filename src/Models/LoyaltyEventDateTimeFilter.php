<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Filter events by date time range.
 */
class LoyaltyEventDateTimeFilter implements \JsonSerializable
{
    /**
     * @var TimeRange
     */
    private $createdAt;

    /**
     * @param TimeRange $createdAt
     */
    public function __construct(TimeRange $createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Returns Created At.
     *
     * Represents a generic time range. The start and end values are
     * represented in RFC 3339 format. Time ranges are customized to be
     * inclusive or exclusive based on the needs of a particular endpoint.
     * Refer to the relevant endpoint-specific documentation to determine
     * how time ranges are handled.
     */
    public function getCreatedAt(): TimeRange
    {
        return $this->createdAt;
    }

    /**
     * Sets Created At.
     *
     * Represents a generic time range. The start and end values are
     * represented in RFC 3339 format. Time ranges are customized to be
     * inclusive or exclusive based on the needs of a particular endpoint.
     * Refer to the relevant endpoint-specific documentation to determine
     * how time ranges are handled.
     *
     * @required
     * @maps created_at
     */
    public function setCreatedAt(TimeRange $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['created_at'] = $this->createdAt;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
