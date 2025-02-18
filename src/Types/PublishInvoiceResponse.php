<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Describes a `PublishInvoice` response.
 */
class PublishInvoiceResponse extends JsonSerializableType
{
    /**
     * @var ?Invoice $invoice The published invoice.
     */
    #[JsonProperty('invoice')]
    private ?Invoice $invoice;

    /**
     * @var ?array<Error> $errors Information about errors encountered during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @param array{
     *   invoice?: ?Invoice,
     *   errors?: ?array<Error>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->invoice = $values['invoice'] ?? null;
        $this->errors = $values['errors'] ?? null;
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
     * @return ?array<Error>
     */
    public function getErrors(): ?array
    {
        return $this->errors;
    }

    /**
     * @param ?array<Error> $value
     */
    public function setErrors(?array $value = null): self
    {
        $this->errors = $value;
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
