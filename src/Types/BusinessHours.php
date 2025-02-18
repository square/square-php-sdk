<?php

namespace Square\Types;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Core\Types\ArrayType;

/**
 * The hours of operation for a location.
 */
class BusinessHours extends JsonSerializableType
{
    /**
     * @var ?array<BusinessHoursPeriod> $periods The list of time periods during which the business is open. There can be at most 10 periods per day.
     */
    #[JsonProperty('periods'), ArrayType([BusinessHoursPeriod::class])]
    private ?array $periods;

    /**
     * @param array{
     *   periods?: ?array<BusinessHoursPeriod>,
     * } $values
     */
    public function __construct(
        array $values = [],
    ) {
        $this->periods = $values['periods'] ?? null;
    }

    /**
     * @return ?array<BusinessHoursPeriod>
     */
    public function getPeriods(): ?array
    {
        return $this->periods;
    }

    /**
     * @param ?array<BusinessHoursPeriod> $value
     */
    public function setPeriods(?array $value = null): self
    {
        $this->periods = $value;
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
