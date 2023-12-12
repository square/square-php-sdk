<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\CatalogAvailabilityPeriod;

/**
 * Builder for model CatalogAvailabilityPeriod
 *
 * @see CatalogAvailabilityPeriod
 */
class CatalogAvailabilityPeriodBuilder
{
    /**
     * @var CatalogAvailabilityPeriod
     */
    private $instance;

    private function __construct(CatalogAvailabilityPeriod $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new catalog availability period Builder object.
     */
    public static function init(): self
    {
        return new self(new CatalogAvailabilityPeriod());
    }

    /**
     * Sets start local time field.
     */
    public function startLocalTime(?string $value): self
    {
        $this->instance->setStartLocalTime($value);
        return $this;
    }

    /**
     * Unsets start local time field.
     */
    public function unsetStartLocalTime(): self
    {
        $this->instance->unsetStartLocalTime();
        return $this;
    }

    /**
     * Sets end local time field.
     */
    public function endLocalTime(?string $value): self
    {
        $this->instance->setEndLocalTime($value);
        return $this;
    }

    /**
     * Unsets end local time field.
     */
    public function unsetEndLocalTime(): self
    {
        $this->instance->unsetEndLocalTime();
        return $this;
    }

    /**
     * Sets day of week field.
     */
    public function dayOfWeek(?string $value): self
    {
        $this->instance->setDayOfWeek($value);
        return $this;
    }

    /**
     * Initializes a new catalog availability period object.
     */
    public function build(): CatalogAvailabilityPeriod
    {
        return CoreHelper::clone($this->instance);
    }
}
