<?php

namespace Square\Invoices\Requests;

use Square\Core\Json\JsonSerializableType;

class DeleteInvoicesRequest extends JsonSerializableType
{
    /**
     * @var string $invoiceId The ID of the invoice to delete.
     */
    private string $invoiceId;

    /**
     * The version of the [invoice](entity:Invoice) to delete.
     * If you do not know the version, you can call [GetInvoice](api-endpoint:Invoices-GetInvoice) or
     * [ListInvoices](api-endpoint:Invoices-ListInvoices).
     *
     * @var ?int $version
     */
    private ?int $version;

    /**
     * @param array{
     *   invoiceId: string,
     *   version?: ?int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->invoiceId = $values['invoiceId'];
        $this->version = $values['version'] ?? null;
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
     * @return ?int
     */
    public function getVersion(): ?int
    {
        return $this->version;
    }

    /**
     * @param ?int $value
     */
    public function setVersion(?int $value = null): self
    {
        $this->version = $value;
        return $this;
    }
}
