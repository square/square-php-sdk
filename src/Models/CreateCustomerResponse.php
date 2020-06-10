<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Defines the fields that are included in the response body of
 * a request to the CreateCustomer endpoint.
 *
 * One of `errors` or `customer` is present in a given response (never both).
 */
class CreateCustomerResponse implements \JsonSerializable
{
    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * @var Customer|null
     */
    private $customer;

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
     * Returns Customer.
     *
     * Represents a Square customer profile, which can have one or more
     * cards on file associated with it.
     */
    public function getCustomer(): ?Customer
    {
        return $this->customer;
    }

    /**
     * Sets Customer.
     *
     * Represents a Square customer profile, which can have one or more
     * cards on file associated with it.
     *
     * @maps customer
     */
    public function setCustomer(?Customer $customer): void
    {
        $this->customer = $customer;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['errors']   = $this->errors;
        $json['customer'] = $this->customer;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
