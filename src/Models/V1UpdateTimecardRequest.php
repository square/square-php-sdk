<?php

declare(strict_types=1);

namespace Square\Models;

class V1UpdateTimecardRequest implements \JsonSerializable
{
    /**
     * @var V1Timecard
     */
    private $body;

    /**
     * @param V1Timecard $body
     */
    public function __construct(V1Timecard $body)
    {
        $this->body = $body;
    }

    /**
     * Returns Body.
     *
     * Represents a timecard for an employee.
     */
    public function getBody(): V1Timecard
    {
        return $this->body;
    }

    /**
     * Sets Body.
     *
     * Represents a timecard for an employee.
     *
     * @required
     * @maps body
     */
    public function setBody(V1Timecard $body): void
    {
        $this->body = $body;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['body'] = $this->body;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
