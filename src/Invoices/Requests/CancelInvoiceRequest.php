<?php

namespace Square\Invoices\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class CancelInvoiceRequest extends JsonSerializableType
{
    /**
     * @var string $invoiceId The ID of the [invoice](entity:Invoice) to cancel.
     */
    private string $invoiceId;

    /**
     * The version of the [invoice](entity:Invoice) to cancel.
     * If you do not know the version, you can call
     * [GetInvoice](api-endpoint:Invoices-GetInvoice) or [ListInvoices](api-endpoint:Invoices-ListInvoices).
     *
     * @var int $version
     */
    #[JsonProperty('version')]
    private int $version;

    /**
     * @param array{
     *   invoiceId: string,
     *   version: int,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->invoiceId = $values['invoiceId'];
        $this->version = $values['version'];
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
}
