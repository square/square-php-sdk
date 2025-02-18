<?php

namespace Square\Invoices\Requests;

use Square\Core\Json\JsonSerializableType;

class GetInvoicesRequest extends JsonSerializableType
{
    /**
     * @var string $invoiceId The ID of the invoice to retrieve.
     */
    private string $invoiceId;

    /**
     * @param array{
     *   invoiceId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->invoiceId = $values['invoiceId'];
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
}
