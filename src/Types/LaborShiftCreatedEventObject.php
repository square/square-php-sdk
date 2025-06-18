<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class LaborShiftCreatedEventObject extends JsonSerializableType
{
    /**
     * @var ?Shift $shift The new `Shift`.
     */
    #[JsonProperty('shift')]
    private ?Shift $shift;

    /**
     * @param array{
     *   shift?: ?Shift,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->shift = $values['shift'] ?? null;
    }

    /**
     * @return ?Shift
     */
    public function getShift(): ?Shift
    {
        return $this->shift;
    }

    /**
     * @param ?Shift $value
     */
    public function setShift(?Shift $value = null): self
    {
        $this->shift = $value;
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
