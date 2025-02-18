<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

class BatchChangeInventoryRequest extends JsonSerializableType
{
    /**
     * A client-supplied, universally unique identifier (UUID) for the
     * request.
     *
     * See [Idempotency](https://developer.squareup.com/docs/build-basics/common-api-patterns/idempotency) in the
     * [API Development 101](https://developer.squareup.com/docs/buildbasics) section for more
     * information.
     *
     * @var string $idempotencyKey
     */
    #[JsonProperty('idempotency_key')]
    private string $idempotencyKey;

    /**
     * The set of physical counts and inventory adjustments to be made.
     * Changes are applied based on the client-supplied timestamp and may be sent
     * out of order.
     *
     * @var ?array<InventoryChange> $changes
     */
    #[JsonProperty('changes'), ArrayType([InventoryChange::class])]
    private ?array $changes;

    /**
     * Indicates whether the current physical count should be ignored if
     * the quantity is unchanged since the last physical count. Default: `true`.
     *
     * @var ?bool $ignoreUnchangedCounts
     */
    #[JsonProperty('ignore_unchanged_counts')]
    private ?bool $ignoreUnchangedCounts;

    /**
     * @param array{
     *   idempotencyKey: string,
     *   changes?: ?array<InventoryChange>,
     *   ignoreUnchangedCounts?: ?bool,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->idempotencyKey = $values['idempotencyKey'];
        $this->changes = $values['changes'] ?? null;
        $this->ignoreUnchangedCounts = $values['ignoreUnchangedCounts'] ?? null;
    }

    /**
     * @return string
     */
    public function getIdempotencyKey(): string
    {
        return $this->idempotencyKey;
    }

    /**
     * @param string $value
     */
    public function setIdempotencyKey(string $value): self
    {
        $this->idempotencyKey = $value;
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
     * @return ?bool
     */
    public function getIgnoreUnchangedCounts(): ?bool
    {
        return $this->ignoreUnchangedCounts;
    }

    /**
     * @param ?bool $value
     */
    public function setIgnoreUnchangedCounts(?bool $value = null): self
    {
        $this->ignoreUnchangedCounts = $value;
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
