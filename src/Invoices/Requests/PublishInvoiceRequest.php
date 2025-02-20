<?php

namespace Square\Invoices\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class PublishInvoiceRequest extends JsonSerializableType
{
    /**
     * @var string $invoiceId The ID of the invoice to publish.
     */
    private string $invoiceId;

    /**
     * The version of the [invoice](entity:Invoice) to publish.
     * This must match the current version of the invoice; otherwise, the request is rejected.
     *
     * @var int $version
     */
    #[JsonProperty('version')]
    private int $version;

    /**
     * A unique string that identifies the `PublishInvoice` request. If you do not
     * provide `idempotency_key` (or provide an empty string as the value), the endpoint
     * treats each request as independent.
     *
     * For more information, see [Idempotency](https://developer.squareup.com/docs/build-basics/common-api-patterns/idempotency).
     *
     * @var ?string $idempotencyKey
     */
    #[JsonProperty('idempotency_key')]
    private ?string $idempotencyKey;

    /**
     * @param array{
     *   invoiceId: string,
     *   version: int,
     *   idempotencyKey?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->invoiceId = $values['invoiceId'];
        $this->version = $values['version'];
        $this->idempotencyKey = $values['idempotencyKey'] ?? null;
    }

    /**
     * @return string
     */
    public function getInvoiceId(): string
    {
        return $this->invoiceId;
    }

    /**
     * @param string $value
     */
    public function setInvoiceId(string $value): self
    {
        $this->invoiceId = $value;
        return $this;
    }

    /**
     * @return int
     */
    public function getVersion(): int
    {
        return $this->version;
    }

    /**
     * @param int $value
     */
    public function setVersion(int $value): self
    {
        $this->version = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getIdempotencyKey(): ?string
    {
        return $this->idempotencyKey;
    }

    /**
     * @param ?string $value
     */
    public function setIdempotencyKey(?string $value = null): self
    {
        $this->idempotencyKey = $value;
        return $this;
    }
}
