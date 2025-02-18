<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class BatchChangeInventoryResponse extends JsonSerializableType
{
    /**
     * @var ?array<Error> $errors Any errors that occurred during the request.
     */
    #[JsonProperty('errors'), ArrayType([Error::class])]
    private ?array $errors;

    /**
     * @var ?array<InventoryCount> $counts The current counts for all objects referenced in the request.
     */
    #[JsonProperty('counts'), ArrayType([InventoryCount::class])]
    private ?array $counts;

    /**
     * @var ?array<InventoryChange> $changes Changes created for the request.
     */
    #[JsonProperty('changes'), ArrayType([InventoryChange::class])]
    private ?array $changes;

    /**
     * @param array{
     *   errors?: ?array<Error>,
     *   counts?: ?array<InventoryCount>,
     *   changes?: ?array<InventoryChange>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->errors = $values['errors'] ?? null;
        $this->counts = $values['counts'] ?? null;
        $this->changes = $values['changes'] ?? null;
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
     * @return ?array<InventoryCount>
     */
    public function getCounts(): ?array
    {
        return $this->counts;
    }

    /**
     * @param ?array<InventoryCount> $value
     */
    public function setCounts(?array $value = null): self
    {
        $this->counts = $value;
        return $this;
    }

    /**
     * @return ?array<InventoryChange>
     */
    public function getChanges(): ?array
    {
        return $this->changes;
    }

    /**
     * @param ?array<InventoryChange> $value
     */
    public function setChanges(?array $value = null): self
    {
        $this->changes = $value;
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
