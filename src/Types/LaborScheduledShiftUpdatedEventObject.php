<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class LaborScheduledShiftUpdatedEventObject extends JsonSerializableType
{
    /**
     * @var ?ScheduledShift $scheduledShift The updated `ScheduledShift`.
     */
    #[JsonProperty('ScheduledShift')]
    private ?ScheduledShift $scheduledShift;

    /**
     * @param array{
     *   scheduledShift?: ?ScheduledShift,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->scheduledShift = $values['scheduledShift'] ?? null;
    }

    /**
     * @return ?ScheduledShift
     */
    public function getScheduledShift(): ?ScheduledShift
    {
        return $this->scheduledShift;
    }

    /**
     * @param ?ScheduledShift $value
     */
    public function setScheduledShift(?ScheduledShift $value = null): self
    {
        $this->scheduledShift = $value;
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
