<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Defines the fields that are included in the response body of
 * a request to the SearchCustomers endpoint.
 *
 * One of `errors` or `customers` is present in a given response (never both).
 */
class SearchCustomersResponse implements \JsonSerializable
{
    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * @var Customer[]|null
     */
    private $customers;

    /**
     * @var string|null
     */
    private $cursor;

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
     * Returns Customers.
     *
     * An array of `Customer` objects that match a query.
     *
     * @return Customer[]|null
     */
    public function getCustomers(): ?array
    {
        return $this->customers;
    }

    /**
     * Sets Customers.
     *
     * An array of `Customer` objects that match a query.
     *
     * @maps customers
     *
     * @param Customer[]|null $customers
     */
    public function setCustomers(?array $customers): void
    {
        $this->customers = $customers;
    }

    /**
     * Returns Cursor.
     *
     * A pagination cursor that can be used during subsequent calls
     * to SearchCustomers to retrieve the next set of results associated
     * with the original query. Pagination cursors are only present when
     * a request succeeds and additional results are available.
     *
     * See the [Pagination guide](https://developer.squareup.com/docs/working-with-apis/pagination) for
     * more information.
     */
    public function getCursor(): ?string
    {
        return $this->cursor;
    }

    /**
     * Sets Cursor.
     *
     * A pagination cursor that can be used during subsequent calls
     * to SearchCustomers to retrieve the next set of results associated
     * with the original query. Pagination cursors are only present when
     * a request succeeds and additional results are available.
     *
     * See the [Pagination guide](https://developer.squareup.com/docs/working-with-apis/pagination) for
     * more information.
     *
     * @maps cursor
     */
    public function setCursor(?string $cursor): void
    {
        $this->cursor = $cursor;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['errors']    = $this->errors;
        $json['customers'] = $this->customers;
        $json['cursor']    = $this->cursor;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
