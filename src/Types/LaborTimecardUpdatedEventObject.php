<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class LaborTimecardUpdatedEventObject extends JsonSerializableType
{
    /**
     * @var ?Timecard $timecard The updated `Timecard`.
     */
    #[JsonProperty('timecard')]
    private ?Timecard $timecard;

    /**
     * @param array{
     *   timecard?: ?Timecard,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->timecard = $values['timecard'] ?? null;
    }

    /**
     * @return ?Timecard
     */
    public function getTimecard(): ?Timecard
    {
        return $this->timecard;
    }

    /**
     * @param ?Timecard $value
     */
    public function setTimecard(?Timecard $value = null): self
    {
        $this->timecard = $value;
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
