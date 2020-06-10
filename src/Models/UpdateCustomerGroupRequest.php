<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Defines the body parameters that can be provided in a request to the
 * [UpdateCustomerGroup](#endpoint-updatecustomergroup) endpoint.
 */
class UpdateCustomerGroupRequest implements \JsonSerializable
{
    /**
     * @var CustomerGroup
     */
    private $group;

    /**
     * @param CustomerGroup $group
     */
    public function __construct(CustomerGroup $group)
    {
        $this->group = $group;
    }

    /**
     * Returns Group.
     *
     * Represents a group of customer profiles.
     *
     * Customer groups can be created, modified, and have their membership defined either via
     * the Customers API or within Customer Directory in the Square Dashboard or Point of Sale.
     */
    public function getGroup(): CustomerGroup
    {
        return $this->group;
    }

    /**
     * Sets Group.
     *
     * Represents a group of customer profiles.
     *
     * Customer groups can be created, modified, and have their membership defined either via
     * the Customers API or within Customer Directory in the Square Dashboard or Point of Sale.
     *
     * @required
     * @maps group
     */
    public function setGroup(CustomerGroup $group): void
    {
        $this->group = $group;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['group'] = $this->group;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
