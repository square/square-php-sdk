<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\Error;
use Square\Legacy\Models\ListLocationBookingProfilesResponse;
use Square\Legacy\Models\LocationBookingProfile;

/**
 * Builder for model ListLocationBookingProfilesResponse
 *
 * @see ListLocationBookingProfilesResponse
 */
class ListLocationBookingProfilesResponseBuilder
{
    /**
     * @var ListLocationBookingProfilesResponse
     */
    private $instance;

    private function __construct(ListLocationBookingProfilesResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new List Location Booking Profiles Response Builder object.
     */
    public static function init(): self
    {
        return new self(new ListLocationBookingProfilesResponse());
    }

    /**
     * Sets location booking profiles field.
     *
     * @param LocationBookingProfile[]|null $value
     */
    public function locationBookingProfiles(?array $value): self
    {
        $this->instance->setLocationBookingProfiles($value);
        return $this;
    }

    /**
     * Sets cursor field.
     *
     * @param string|null $value
     */
    public function cursor(?string $value): self
    {
        $this->instance->setCursor($value);
        return $this;
    }

    /**
     * Sets errors field.
     *
     * @param Error[]|null $value
     */
    public function errors(?array $value): self
    {
        $this->instance->setErrors($value);
        return $this;
    }

    /**
     * Initializes a new List Location Booking Profiles Response object.
     */
    public function build(): ListLocationBookingProfilesResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
