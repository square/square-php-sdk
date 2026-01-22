<?php

namespace Square\BankAccounts\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class CreateBankAccountRequest extends JsonSerializableType
{
    /**
     * Unique ID. For more information, see the
     * [Idempotency](https://developer.squareup.com/docs/working-with-apis/idempotency).
     *
     * @var string $idempotencyKey
     */
    #[JsonProperty('idempotency_key')]
    private string $idempotencyKey;

    /**
     * The ID of the source that represents the bank account information to be stored. This field
     * accepts the payment token created by WebSDK
     *
     * @var string $sourceId
     */
    #[JsonProperty('source_id')]
    private string $sourceId;

    /**
     * @var ?string $customerId The ID of the customer associated with the bank account to be stored.
     */
    #[JsonProperty('customer_id')]
    private ?string $customerId;

    /**
     * @param array{
     *   idempotencyKey: string,
     *   sourceId: string,
     *   customerId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->idempotencyKey = $values['idempotencyKey'];
        $this->sourceId = $values['sourceId'];
        $this->customerId = $values['customerId'] ?? null;
    }

    /**
     * @return string
     */
    public function getIdempotencyKey(): string
    {
        return $this->idempotencyKey;
    }

    /**
     * @param string $value
     */
    public function setIdempotencyKey(string $value): self
    {
        $this->idempotencyKey = $value;
        return $this;
    }

    /**
     * @return string
     */
    public function getSourceId(): string
    {
        return $this->sourceId;
    }

    /**
     * @param string $value
     */
    public function setSourceId(string $value): self
    {
        $this->sourceId = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCustomerId(): ?string
    {
        return $this->customerId;
    }

    /**
     * @param ?string $value
     */
    public function setCustomerId(?string $value = null): self
    {
        $this->customerId = $value;
        return $this;
    }
}
