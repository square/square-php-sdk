<?php

declare(strict_types=1);

namespace Square\Models;

class V1UpdateEmployeeRequest implements \JsonSerializable
{
    /**
     * @var V1Employee
     */
    private $body;

    /**
     * @param V1Employee $body
     */
    public function __construct(V1Employee $body)
    {
        $this->body = $body;
    }

    /**
     * Returns Body.
     *
     * Represents one of a business's employees.
     */
    public function getBody(): V1Employee
    {
        return $this->body;
    }

    /**
     * Sets Body.
     *
     * Represents one of a business's employees.
     *
     * @required
     * @maps body
     */
    public function setBody(V1Employee $body): void
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
