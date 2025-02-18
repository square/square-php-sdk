<?php

namespace Square\Locations\Transactions\Requests;

use Square\Core\Json\JsonSerializableType;

class GetTransactionsRequest extends JsonSerializableType
{
    /**
     * @var string $locationId The ID of the transaction's associated location.
     */
    private string $locationId;

    /**
     * @var string $transactionId The ID of the transaction to retrieve.
     */
    private string $transactionId;

    /**
     * @param array{
     *   locationId: string,
     *   transactionId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->locationId = $values['locationId'];
        $this->transactionId = $values['transactionId'];
    }

    /**
     * @return string
     */
    public function getLocationId(): string
    {
        return $this->locationId;
    }

    /**
     * @param string $value
     */
    public function setLocationId(string $value): self
    {
        $this->locationId = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getTransactionId(): string
    {
        return $this->transactionId;
    }

    /**
     * @param string $value
     */
    public function setTransactionId(string $value): self
    {
        $this->transactionId = $value;
        return $this;
    }
}
