<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

/**
 * Specifies a decimal number range.
 */
class FloatNumberRange extends JsonSerializableType
{
    /**
     * @var ?string $startAt A decimal value indicating where the range starts.
     */
    #[JsonProperty('start_at')]
    private ?string $startAt;

    /**
     * @var ?string $endAt A decimal value indicating where the range ends.
     */
    #[JsonProperty('end_at')]
    private ?string $endAt;

    /**
     * @param array{
     *   startAt?: ?string,
     *   endAt?: ?string,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->startAt = $values['startAt'] ?? null;
        $this->endAt = $values['endAt'] ?? null;
    }

    /**
     * @return ?string
     */
    public function getStartAt(): ?string
    {
        return $this->startAt;
    }

    /**
     * @param ?string $value
     */
    public function setStartAt(?string $value = null): self
    {
        $this->startAt = $value;
        return $this;
    }

    /**
     * @return ?string
     */
    public function getEndAt(): ?string
    {
        return $this->endAt;
    }

    /**
     * @param ?string $value
     */
    public function setEndAt(?string $value = null): self
    {
        $this->endAt = $value;
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
