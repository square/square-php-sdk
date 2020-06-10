<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Defines the fields that are included in the response body of
 * a request to the [CreateCustomerGroup](#endpoint-createcustomergroup) endpoint.
 *
 * One of `errors` or `group` is present in a given response (never both).
 */
class CreateCustomerGroupResponse implements \JsonSerializable
{
    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * @var CustomerGroup|null
     */
    private $group;

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
     * Returns Group.
     *
     * Represents a group of customer profiles.
     *
     * Customer groups can be created, modified, and have their membership defined either via
     * the Customers API or within Customer Directory in the Square Dashboard or Point of Sale.
     */
    public function getGroup(): ?CustomerGroup
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
     * @maps group
     */
    public function setGroup(?CustomerGroup $group): void
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
        $json['errors'] = $this->errors;
        $json['group']  = $this->group;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
