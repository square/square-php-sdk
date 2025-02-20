<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * Describes a `SearchInvoices` response.
 */
class SearchInvoicesResponse extends JsonSerializableType
{
    /**
     * @var ?array<Invoice> $invoices The list of invoices returned by the search.
     */
    #[JsonProperty('invoices'), ArrayType([Invoice::class])]
    private ?array $invoices;

    /**
     * When a response is truncated, it includes a cursor that you can use in a
     * subsequent request to fetch the next set of invoices. If empty, this is the final
     * response.
     * For more information, see [Pagination](https://developer.squareup.com/docs/build-basics/common-api-patterns/pagination).
     *
     * @var ?string $cursor
     */
    #[JsonProperty('cursor')]
    private ?string $cursor;

    /**
     * @var ?array<Error> $errors Information about errors encountered during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @param array{
     *   invoices?: ?array<Invoice>,
     *   cursor?: ?string,
     *   errors?: ?array<Error>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->invoices = $values['invoices'] ?? null;
        $this->cursor = $values['cursor'] ?? null;
        $this->errors = $values['errors'] ?? null;
    }

    /**
     * @return ?array<Invoice>
     */
    public function getInvoices(): ?array
    {
        return $this->invoices;
    }

    /**
     * @param ?array<Invoice> $value
     */
    public function setInvoices(?array $value = null): self
    {
        $this->invoices = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCursor(): ?string
    {
        return $this->cursor;
    }

    /**
     * @param ?string $value
     */
    public function setCursor(?string $value = null): self
    {
        $this->cursor = $value;
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
