<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class ListCashDrawerShiftEventsResponse extends JsonSerializableType
{
    /**
     * Opaque cursor for fetching the next page. Cursor is not present in
     * the last page of results.
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
     * All of the events (payments, refunds, etc.) for a cash drawer during
     * the shift.
     *
     * @var ?array<CashDrawerShiftEvent> $cashDrawerShiftEvents
     */
    #[JsonProperty('cash_drawer_shift_events'), ArrayType([CashDrawerShiftEvent::class])]
    private ?array $cashDrawerShiftEvents;

    /**
     * @param array{
     *   cursor?: ?string,
     *   errors?: ?array<Error>,
     *   cashDrawerShiftEvents?: ?array<CashDrawerShiftEvent>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->cursor = $values['cursor'] ?? null;
        $this->errors = $values['errors'] ?? null;
        $this->cashDrawerShiftEvents = $values['cashDrawerShiftEvents'] ?? null;
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
     * @return ?array<CashDrawerShiftEvent>
     */
    public function getCashDrawerShiftEvents(): ?array
    {
        return $this->cashDrawerShiftEvents;
    }

    /**
     * @param ?array<CashDrawerShiftEvent> $value
     */
    public function setCashDrawerShiftEvents(?array $value = null): self
    {
        $this->cashDrawerShiftEvents = $value;
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
