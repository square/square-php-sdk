<?php

namespace Square\Labor\BreakTypes\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Types\BreakType;

class CreateBreakTypeRequest extends JsonSerializableType
{
    /**
     * @var ?string $idempotencyKey A unique string value to ensure the idempotency of the operation.
     */
    #[JsonProperty('idempotency_key')]
    private ?string $idempotencyKey;

    /**
     * @var BreakType $breakType The `BreakType` to be created.
     */
    #[JsonProperty('break_type')]
    private BreakType $breakType;

    /**
     * @param array{
     *   breakType: BreakType,
     *   idempotencyKey?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->idempotencyKey = $values['idempotencyKey'] ?? null;
        $this->breakType = $values['breakType'];
    }

    /**
     * @return ?string
     */
    public function getIdempotencyKey(): ?string
    {
        return $this->idempotencyKey;
    }

    /**
     * @param ?string $value
     */
    public function setIdempotencyKey(?string $value = null): self
    {
        $this->idempotencyKey = $value;
        return $this;
    }

    /**
     * @return BreakType
     */
    public function getBreakType(): BreakType
    {
        return $this->breakType;
    }

    /**
     * @param BreakType $value
     */
    public function setBreakType(BreakType $value): self
    {
        $this->breakType = $value;
        return $this;
    }
}
