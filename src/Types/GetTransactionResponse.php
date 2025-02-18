<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Defines the fields that are included in the response body of
 * a request to the [RetrieveTransaction](api-endpoint:Transactions-RetrieveTransaction) endpoint.
 *
 * One of `errors` or `transaction` is present in a given response (never both).
 */
class GetTransactionResponse extends JsonSerializableType
{
    /**
     * @var ?array<Error> $errors Any errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @var ?Transaction $transaction The requested transaction.
     */
    #[JsonProperty('transaction')]
    private ?Transaction $transaction;

    /**
     * @param array{
     *   errors?: ?array<Error>,
     *   transaction?: ?Transaction,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->errors = $values['errors'] ?? null;
        $this->transaction = $values['transaction'] ?? null;
    }

    /**
     * @return ?array<Error>
     */
    public function getErrors(): ?array
    {
        return $this->errors;
    }

    /**
     * @param ?array<Error> $value
     */
    public function setErrors(?array $value = null): self
    {
        $this->errors = $value;
        return $this;
    }

    /**
     * @return ?Transaction
     */
    public function getTransaction(): ?Transaction
    {
        return $this->transaction;
    }

    /**
     * @param ?Transaction $value
     */
    public function setTransaction(?Transaction $value = null): self
    {
        $this->transaction = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return $this->toJson();
    }
}
