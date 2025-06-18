<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class InvoicePublishedEventObject extends JsonSerializableType
{
    /**
     * @var ?Invoice $invoice The related invoice.
     */
    #[JsonProperty('invoice')]
    private ?Invoice $invoice;

    /**
     * @param array{
     *   invoice?: ?Invoice,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->invoice = $values['invoice'] ?? null;
    }

    /**
     * @return ?Invoice
     */
    public function getInvoice(): ?Invoice
    {
        return $this->invoice;
    }

    /**
     * @param ?Invoice $value
     */
    public function setInvoice(?Invoice $value = null): self
    {
        $this->invoice = $value;
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
