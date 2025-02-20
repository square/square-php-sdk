<?php

namespace Square\Invoices\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\Invoice;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class UpdateInvoiceRequest extends JsonSerializableType
{
    /**
     * @var string $invoiceId The ID of the invoice to update.
     */
    private string $invoiceId;

    /**
     * The invoice fields to add, change, or clear. Fields can be cleared using
     * null values or the `remove` field (for individual payment requests or reminders).
     * The current invoice `version` is also required. For more information, including requirements,
     * limitations, and more examples, see [Update an Invoice](https://developer.squareup.com/docs/invoices-api/update-invoices).
     *
     * @var Invoice $invoice
     */
    #[JsonProperty('invoice')]
    private Invoice $invoice;

    /**
     * A unique string that identifies the `UpdateInvoice` request. If you do not
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
     * The list of fields to clear. Although this field is currently supported, we
     * recommend using null values or the `remove` field when possible. For examples, see
     * [Update an Invoice](https://developer.squareup.com/docs/invoices-api/update-invoices).
     *
     * @var ?array<string> $fieldsToClear
     */
    #[JsonProperty('fields_to_clear'), ArrayType(['string'])]
    private ?array $fieldsToClear;

    /**
     * @param array{
     *   invoiceId: string,
     *   invoice: Invoice,
     *   idempotencyKey?: ?string,
     *   fieldsToClear?: ?array<string>,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->invoiceId = $values['invoiceId'];
        $this->invoice = $values['invoice'];
        $this->idempotencyKey = $values['idempotencyKey'] ?? null;
        $this->fieldsToClear = $values['fieldsToClear'] ?? null;
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

    /**
     * @return ?array<string>
     */
    public function getFieldsToClear(): ?array
    {
        return $this->fieldsToClear;
    }

    /**
     * @param ?array<string> $value
     */
    public function setFieldsToClear(?array $value = null): self
    {
        $this->fieldsToClear = $value;
        return $this;
    }
}
