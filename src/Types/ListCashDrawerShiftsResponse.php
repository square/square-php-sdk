<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class ListCashDrawerShiftsResponse extends JsonSerializableType
{
    /**
     * Opaque cursor for fetching the next page of results. Cursor is not
     * present in the last page of results.
     *
     * @var ?string $cursor
     */
    #[JsonProperty('cursor')]
    private ?string $cursor;

    /**
     * @var ?array<Error> $errors Any errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * A collection of CashDrawerShiftSummary objects for shifts that match
     * the query.
     *
     * @var ?array<CashDrawerShiftSummary> $cashDrawerShifts
     */
    #[JsonProperty('cash_drawer_shifts'), ArrayType([CashDrawerShiftSummary::class])]
    private ?array $cashDrawerShifts;

    /**
     * @param array{
     *   cursor?: ?string,
     *   errors?: ?array<Error>,
     *   cashDrawerShifts?: ?array<CashDrawerShiftSummary>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->cursor = $values['cursor'] ?? null;
        $this->errors = $values['errors'] ?? null;
        $this->cashDrawerShifts = $values['cashDrawerShifts'] ?? null;
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
     * @return ?array<CashDrawerShiftSummary>
     */
    public function getCashDrawerShifts(): ?array
    {
        return $this->cashDrawerShifts;
    }

    /**
     * @param ?array<CashDrawerShiftSummary> $value
     */
    public function setCashDrawerShifts(?array $value = null): self
    {
        $this->cashDrawerShifts = $value;
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
