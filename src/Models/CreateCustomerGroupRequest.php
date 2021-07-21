<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Defines the body parameters that can be included in a request to the
 * [CreateCustomerGroup]($e/CustomerGroups/CreateCustomerGroup) endpoint.
 */
class CreateCustomerGroupRequest implements \JsonSerializable
{
    /**
     * @var string|null
     */
    private $idempotencyKey;

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
     * Returns Idempotency Key.
     *
     * The idempotency key for the request. For more information, see [Idempotency](https://developer.
     * squareup.com/docs/basics/api101/idempotency).
     */
    public function getIdempotencyKey(): ?string
    {
        return $this->idempotencyKey;
    }

    /**
     * Sets Idempotency Key.
     *
     * The idempotency key for the request. For more information, see [Idempotency](https://developer.
     * squareup.com/docs/basics/api101/idempotency).
     *
     * @maps idempotency_key
     */
    public function setIdempotencyKey(?string $idempotencyKey): void
    {
        $this->idempotencyKey = $idempotencyKey;
    }

    /**
     * Returns Group.
     *
     * Represents a group of customer profiles.
     *
     * Customer groups can be created, be modified, and have their membership defined using
     * the Customers API or within the Customer Directory in the Square Seller Dashboard or Point of Sale.
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
     * Customer groups can be created, be modified, and have their membership defined using
     * the Customers API or within the Customer Directory in the Square Seller Dashboard or Point of Sale.
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
        if (isset($this->idempotencyKey)) {
            $json['idempotency_key'] = $this->idempotencyKey;
        }
        $json['group']               = $this->group;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
