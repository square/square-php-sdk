<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents the tax IDs for an invoice recipient. The country of the seller account determines
 * whether the corresponding `tax_ids` field is available for the customer. For more information,
 * see [Invoice recipient tax IDs](https://developer.squareup.com/docs/invoices-api/overview#recipient-tax-ids).
 */
class InvoiceRecipientTaxIds extends JsonSerializableType
{
    /**
     * @var ?string $euVat The EU VAT identification number for the invoice recipient. For example, `IE3426675K`.
     */
    #[JsonProperty('eu_vat')]
    private ?string $euVat;

    /**
     * @param array{
     *   euVat?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->euVat = $values['euVat'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getEuVat(): ?string
    {
        return $this->euVat;
    }

    /**
     * @param ?string $value
     */
    public function setEuVat(?string $value = null): self
    {
        $this->euVat = $value;
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
