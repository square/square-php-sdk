<?php

namespace Square\Labor\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Types\Timecard;

class CreateTimecardRequest extends JsonSerializableType
{
    /**
     * @var ?string $idempotencyKey A unique string value to ensure the idempotency of the operation.
     */
    #[JsonProperty('idempotency_key')]
    private ?string $idempotencyKey;

    /**
     * @var Timecard $timecard The `Timecard` to be created.
     */
    #[JsonProperty('timecard')]
    private Timecard $timecard;

    /**
     * @param array{
     *   timecard: Timecard,
     *   idempotencyKey?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->idempotencyKey = $values['idempotencyKey'] ?? null;
        $this->timecard = $values['timecard'];
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
     * @return Timecard
     */
    public function getTimecard(): Timecard
    {
        return $this->timecard;
    }

    /**
     * @param Timecard $value
     */
    public function setTimecard(Timecard $value): self
    {
        $this->timecard = $value;
        return $this;
    }
}
