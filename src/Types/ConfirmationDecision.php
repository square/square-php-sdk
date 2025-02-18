<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class ConfirmationDecision extends JsonSerializableType
{
    /**
     * @var ?bool $hasAgreed The buyer's decision to the displayed terms.
     */
    #[JsonProperty('has_agreed')]
    private ?bool $hasAgreed;

    /**
     * @param array{
     *   hasAgreed?: ?bool,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->hasAgreed = $values['hasAgreed'] ?? null;
    }

    /**
     * @return ?bool
     */
    public function getHasAgreed(): ?bool
    {
        return $this->hasAgreed;
    }

    /**
     * @param ?bool $value
     */
    public function setHasAgreed(?bool $value = null): self
    {
        $this->hasAgreed = $value;
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
