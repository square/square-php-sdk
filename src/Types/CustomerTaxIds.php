<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents the tax ID associated with a [customer profile](entity:Customer). The corresponding `tax_ids` field is available only for customers of sellers in EU countries or the United Kingdom.
 * For more information, see [Customer tax IDs](https://developer.squareup.com/docs/customers-api/what-it-does#customer-tax-ids).
 */
class CustomerTaxIds extends JsonSerializableType
{
    /**
     * @var ?string $euVat The EU VAT identification number for the customer. For example, `IE3426675K`. The ID can contain alphanumeric characters only.
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
