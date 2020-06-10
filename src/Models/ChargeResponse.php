<?php

declare(strict_types=1);

namespace Square\Models;

/**
 * Defines the fields that are included in the response body of
 * a request to the [Charge](#endpoint-charge) endpoint.
 *
 * One of `errors` or `transaction` is present in a given response (never both).
 */
class ChargeResponse implements \JsonSerializable
{
    /**
     * @var Error[]|null
     */
    private $errors;

    /**
     * @var Transaction|null
     */
    private $transaction;

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
     * Returns Transaction.
     *
     * Represents a transaction processed with Square, either with the
     * Connect API or with Square Point of Sale.
     *
     * The `tenders` field of this object lists all methods of payment used to pay in
     * the transaction.
     */
    public function getTransaction(): ?Transaction
    {
        return $this->transaction;
    }

    /**
     * Sets Transaction.
     *
     * Represents a transaction processed with Square, either with the
     * Connect API or with Square Point of Sale.
     *
     * The `tenders` field of this object lists all methods of payment used to pay in
     * the transaction.
     *
     * @maps transaction
     */
    public function setTransaction(?Transaction $transaction): void
    {
        $this->transaction = $transaction;
    }

    /**
     * Encode this object to JSON
     *
     * @return mixed
     */
    public function jsonSerialize()
    {
        $json = [];
        $json['errors']      = $this->errors;
        $json['transaction'] = $this->transaction;

        return array_filter($json, function ($val) {
            return $val !== null;
        });
    }
}
