<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\BusinessHours;
use Square\Legacy\Models\BusinessHoursPeriod;

/**
 * Builder for model BusinessHours
 *
 * @see BusinessHours
 */
class BusinessHoursBuilder
{
    /**
     * @var BusinessHours
     */
    private $instance;

    private function __construct(BusinessHours $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Business Hours Builder object.
     */
    public static function init(): self
    {
        return new self(new BusinessHours());
    }

    /**
     * Sets periods field.
     *
     * @param BusinessHoursPeriod[]|null $value
     */
    public function periods(?array $value): self
    {
        $this->instance->setPeriods($value);
        return $this;
    }

    /**
     * Unsets periods field.
     */
    public function unsetPeriods(): self
    {
        $this->instance->unsetPeriods();
        return $this;
    }

    /**
     * Initializes a new Business Hours object.
     */
    public function build(): BusinessHours
    {
        return CoreHelper::clone($this->instance);
    }
}
