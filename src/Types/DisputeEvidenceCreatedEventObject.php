<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class DisputeEvidenceCreatedEventObject extends JsonSerializableType
{
    /**
     * @var ?Dispute $object The dispute object.
     */
    #[JsonProperty('object')]
    private ?Dispute $object;

    /**
     * @param array{
     *   object?: ?Dispute,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->object = $values['object'] ?? null;
    }

    /**
     * @return ?Dispute
     */
    public function getObject(): ?Dispute
    {
        return $this->object;
    }

    /**
     * @param ?Dispute $value
     */
    public function setObject(?Dispute $value = null): self
    {
        $this->object = $value;
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
