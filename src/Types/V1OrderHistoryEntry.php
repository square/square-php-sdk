<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * V1OrderHistoryEntry
 */
class V1OrderHistoryEntry extends JsonSerializableType
{
    /**
     * The type of action performed on the order.
     * See [V1OrderHistoryEntryAction](#type-v1orderhistoryentryaction) for possible values
     *
     * @var ?value-of<V1OrderHistoryEntryAction> $action
     */
    #[JsonProperty('action')]
    private ?string $action;

    /**
     * @var ?string $createdAt The time when the action was performed, in ISO 8601 format.
     */
    #[JsonProperty('created_at')]
    private ?string $createdAt;

    /**
     * @param array{
     *   action?: ?value-of<V1OrderHistoryEntryAction>,
     *   createdAt?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->action = $values['action'] ?? null;
        $this->createdAt = $values['createdAt'] ?? null;
    }

    /**
     * @return ?value-of<V1OrderHistoryEntryAction>
     */
    public function getAction(): ?string
    {
        return $this->action;
    }

    /**
     * @param ?value-of<V1OrderHistoryEntryAction> $value
     */
    public function setAction(?string $value = null): self
    {
        $this->action = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    /**
     * @param ?string $value
     */
    public function setCreatedAt(?string $value = null): self
    {
        $this->createdAt = $value;
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
