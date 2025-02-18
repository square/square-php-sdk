<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Represents the arguments used to construct a new phase.
 */
class PhaseInput extends JsonSerializableType
{
    /**
     * @var int $ordinal index of phase in total subscription plan
     */
    #[JsonProperty('ordinal')]
    private int $ordinal;

    /**
     * @var ?string $orderTemplateId id of order to be used in billing
     */
    #[JsonProperty('order_template_id')]
    private ?string $orderTemplateId;

    /**
     * @param array{
     *   ordinal: int,
     *   orderTemplateId?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->ordinal = $values['ordinal'];
        $this->orderTemplateId = $values['orderTemplateId'] ?? null;
    }

    /**
     * @return int
     */
    public function getOrdinal(): int
    {
        return $this->ordinal;
    }

    /**
     * @param int $value
     */
    public function setOrdinal(int $value): self
    {
        $this->ordinal = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getOrderTemplateId(): ?string
    {
        return $this->orderTemplateId;
    }

    /**
     * @param ?string $value
     */
    public function setOrderTemplateId(?string $value = null): self
    {
        $this->orderTemplateId = $value;
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
