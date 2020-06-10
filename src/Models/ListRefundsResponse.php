<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Defines the fields that are included in the response body of
 * a request to the [ListRefunds](#endpoint-listrefunds) endpoint.
 *
 * One of `errors` or `refunds` is present in a given response (never both).
 */
class ListRefundsResponse implements \JsonSerializable
{
    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * @var Refund[]|null
     */
    private $refunds;

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
     * Returns Refunds.
     *
     * An array of refunds that match your query.
     *
     * @return Refund[]|null
     */
    public function getRefunds(): ?array
    {
        return $this->refunds;
    }

    /**
     * Sets Refunds.
     *
     * An array of refunds that match your query.
     *
     * @maps refunds
     *
     * @param Refund[]|null $refunds
     */
    public function setRefunds(?array $refunds): void
    {
        $this->refunds = $refunds;
    }

    /**
     * Returns Cursor.
     *
     * A pagination cursor for retrieving the next set of results,
     * if any remain. Provide this value as the `cursor` parameter in a subsequent
     * request to this endpoint.
     *
     * See [Paginating results](#paginatingresults) for more information.
     */
    public function getCursor(): ?string
    {
        return $this->cursor;
    }

    /**
     * Sets Cursor.
     *
     * A pagination cursor for retrieving the next set of results,
     * if any remain. Provide this value as the `cursor` parameter in a subsequent
     * request to this endpoint.
     *
     * See [Paginating results](#paginatingresults) for more information.
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
        $json['errors']  = $this->errors;
        $json['refunds'] = $this->refunds;
        $json['cursor']  = $this->cursor;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
