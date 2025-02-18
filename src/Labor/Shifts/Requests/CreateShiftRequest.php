<?php

namespace Square\Labor\Shifts\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Types\Shift;

class CreateShiftRequest extends JsonSerializableType
{
    /**
     * @var ?string $idempotencyKey A unique string value to ensure the idempotency of the operation.
     */
    #[JsonProperty('idempotency_key')]
    private ?string $idempotencyKey;

    /**
     * @var Shift $shift The `Shift` to be created.
     */
    #[JsonProperty('shift')]
    private Shift $shift;

    /**
     * @param array{
     *   shift: Shift,
     *   idempotencyKey?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->idempotencyKey = $values['idempotencyKey'] ?? null;
        $this->shift = $values['shift'];
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
     * @return Shift
     */
    public function getShift(): Shift
    {
        return $this->shift;
    }

    /**
     * @param Shift $value
     */
    public function setShift(Shift $value): self
    {
        $this->shift = $value;
        return $this;
    }
}
