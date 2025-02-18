<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class GetCashDrawerShiftResponse extends JsonSerializableType
{
    /**
     * @var ?CashDrawerShift $cashDrawerShift The cash drawer shift queried for.
     */
    #[JsonProperty('cash_drawer_shift')]
    private ?CashDrawerShift $cashDrawerShift;

    /**
     * @var ?array<Error> $errors Any errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @param array{
     *   cashDrawerShift?: ?CashDrawerShift,
     *   errors?: ?array<Error>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->cashDrawerShift = $values['cashDrawerShift'] ?? null;
        $this->errors = $values['errors'] ?? null;
    }

    /**
     * @return ?CashDrawerShift
     */
    public function getCashDrawerShift(): ?CashDrawerShift
    {
        return $this->cashDrawerShift;
    }

    /**
     * @param ?CashDrawerShift $value
     */
    public function setCashDrawerShift(?CashDrawerShift $value = null): self
    {
        $this->cashDrawerShift = $value;
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
