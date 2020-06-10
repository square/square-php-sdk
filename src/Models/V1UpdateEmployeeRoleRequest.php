<?php

declare(strict_types=1);

namespace Square\Models;

class V1UpdateEmployeeRoleRequest implements \JsonSerializable
{
    /**
     * @var V1EmployeeRole
     */
    private $body;

    /**
     * @param V1EmployeeRole $body
     */
    public function __construct(V1EmployeeRole $body)
    {
        $this->body = $body;
    }

    /**
     * Returns Body.
     *
     * V1EmployeeRole
     */
    public function getBody(): V1EmployeeRole
    {
        return $this->body;
    }

    /**
     * Sets Body.
     *
     * V1EmployeeRole
     *
     * @required
     * @maps body
     */
    public function setBody(V1EmployeeRole $body): void
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
