<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\LocationBookingProfile;

/**
 * Builder for model LocationBookingProfile
 *
 * @see LocationBookingProfile
 */
class LocationBookingProfileBuilder
{
    /**
     * @var LocationBookingProfile
     */
    private $instance;

    private function __construct(LocationBookingProfile $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new location booking profile Builder object.
     */
    public static function init(): self
    {
        return new self(new LocationBookingProfile());
    }

    /**
     * Sets location id field.
     */
    public function locationId(?string $value): self
    {
        $this->instance->setLocationId($value);
        return $this;
    }

    /**
     * Unsets location id field.
     */
    public function unsetLocationId(): self
    {
        $this->instance->unsetLocationId();
        return $this;
    }

    /**
     * Sets booking site url field.
     */
    public function bookingSiteUrl(?string $value): self
    {
        $this->instance->setBookingSiteUrl($value);
        return $this;
    }

    /**
     * Unsets booking site url field.
     */
    public function unsetBookingSiteUrl(): self
    {
        $this->instance->unsetBookingSiteUrl();
        return $this;
    }

    /**
     * Sets online booking enabled field.
     */
    public function onlineBookingEnabled(?bool $value): self
    {
        $this->instance->setOnlineBookingEnabled($value);
        return $this;
    }

    /**
     * Unsets online booking enabled field.
     */
    public function unsetOnlineBookingEnabled(): self
    {
        $this->instance->unsetOnlineBookingEnabled();
        return $this;
    }

    /**
     * Initializes a new location booking profile object.
     */
    public function build(): LocationBookingProfile
    {
        return CoreHelper::clone($this->instance);
    }
}
