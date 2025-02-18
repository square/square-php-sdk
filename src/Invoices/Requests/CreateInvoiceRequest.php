<?php

namespace Square\Invoices\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\Invoice;
use Square\Core\Json\JsonProperty;

class CreateInvoiceRequest extends JsonSerializableType
{
    /**
     * @var Invoice $invoice The invoice to create.
     */
    #[JsonProperty('invoice')]
    private Invoice $invoice;

    /**
     * A unique string that identifies the `CreateInvoice` request. If you do not
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
     *   invoice: Invoice,
     *   idempotencyKey?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->invoice = $values['invoice'];
        $this->idempotencyKey = $values['idempotencyKey'] ?? null;
    }

    /**
     * @return Invoice
     */
    public function getInvoice(): Invoice
    {
        return $this->invoice;
    }

    /**
     * @param Invoice $value
     */
    public function setInvoice(Invoice $value): self
    {
        $this->invoice = $value;
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
