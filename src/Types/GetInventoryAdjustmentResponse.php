<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class GetInventoryAdjustmentResponse extends JsonSerializableType
{
    /**
     * @var ?array<Error> $errors Any errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @var ?InventoryAdjustment $adjustment The requested [InventoryAdjustment](entity:InventoryAdjustment).
     */
    #[JsonProperty('adjustment')]
    private ?InventoryAdjustment $adjustment;

    /**
     * @param array{
     *   errors?: ?array<Error>,
     *   adjustment?: ?InventoryAdjustment,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->errors = $values['errors'] ?? null;
        $this->adjustment = $values['adjustment'] ?? null;
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
     * @return ?InventoryAdjustment
     */
    public function getAdjustment(): ?InventoryAdjustment
    {
        return $this->adjustment;
    }

    /**
     * @param ?InventoryAdjustment $value
     */
    public function setAdjustment(?InventoryAdjustment $value = null): self
    {
        $this->adjustment = $value;
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
