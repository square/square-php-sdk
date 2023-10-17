<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\LocationBookingProfile;
use Square\Models\RetrieveLocationBookingProfileResponse;

/**
 * Builder for model RetrieveLocationBookingProfileResponse
 *
 * @see RetrieveLocationBookingProfileResponse
 */
class RetrieveLocationBookingProfileResponseBuilder
{
    /**
     * @var RetrieveLocationBookingProfileResponse
     */
    private $instance;

    private function __construct(RetrieveLocationBookingProfileResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new retrieve location booking profile response Builder object.
     */
    public static function init(): self
    {
        return new self(new RetrieveLocationBookingProfileResponse());
    }

    /**
     * Sets location booking profile field.
     */
    public function locationBookingProfile(?LocationBookingProfile $value): self
    {
        $this->instance->setLocationBookingProfile($value);
        return $this;
    }

    /**
     * Sets errors field.
     */
    public function errors(?array $value): self
    {
        $this->instance->setErrors($value);
        return $this;
    }

    /**
     * Initializes a new retrieve location booking profile response object.
     */
    public function build(): RetrieveLocationBookingProfileResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
