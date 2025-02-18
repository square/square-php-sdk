<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class GetInventoryPhysicalCountResponse extends JsonSerializableType
{
    /**
     * @var ?array<Error> $errors Any errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @var ?InventoryPhysicalCount $count The requested [InventoryPhysicalCount](entity:InventoryPhysicalCount).
     */
    #[JsonProperty('count')]
    private ?InventoryPhysicalCount $count;

    /**
     * @param array{
     *   errors?: ?array<Error>,
     *   count?: ?InventoryPhysicalCount,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->errors = $values['errors'] ?? null;
        $this->count = $values['count'] ?? null;
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
     * @return ?InventoryPhysicalCount
     */
    public function getCount(): ?InventoryPhysicalCount
    {
        return $this->count;
    }

    /**
     * @param ?InventoryPhysicalCount $value
     */
    public function setCount(?InventoryPhysicalCount $value = null): self
    {
        $this->count = $value;
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
