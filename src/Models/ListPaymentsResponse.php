<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Defines the fields that are included in the response body of
 * a request to the [ListPayments](#endpoint-payments-listpayments) endpoint.
 */
class ListPaymentsResponse implements \JsonSerializable
{
    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * @var Payment[]|null
     */
    private $payments;

    /**
     * @var string|null
     */
    private $cursor;

    /**
     * Returns Errors.
     *
     * Information on errors encountered during the request.
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
     * Information on errors encountered during the request.
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
     * Returns Payments.
     *
     * The requested list of `Payment`s.
     *
     * @return Payment[]|null
     */
    public function getPayments(): ?array
    {
        return $this->payments;
    }

    /**
     * Sets Payments.
     *
     * The requested list of `Payment`s.
     *
     * @maps payments
     *
     * @param Payment[]|null $payments
     */
    public function setPayments(?array $payments): void
    {
        $this->payments = $payments;
    }

    /**
     * Returns Cursor.
     *
     * The pagination cursor to be used in a subsequent request. If empty,
     * this is the final response.
     *
     * See [Pagination](https://developer.squareup.com/docs/basics/api101/pagination) for more information.
     */
    public function getCursor(): ?string
    {
        return $this->cursor;
    }

    /**
     * Sets Cursor.
     *
     * The pagination cursor to be used in a subsequent request. If empty,
     * this is the final response.
     *
     * See [Pagination](https://developer.squareup.com/docs/basics/api101/pagination) for more information.
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
        $json['errors']   = $this->errors;
        $json['payments'] = $this->payments;
        $json['cursor']   = $this->cursor;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
