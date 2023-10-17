<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\ListLocationBookingProfilesResponse;

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
     * Initializes a new list location booking profiles response Builder object.
     */
    public static function init(): self
    {
        return new self(new ListLocationBookingProfilesResponse());
    }

    /**
     * Sets location booking profiles field.
     */
    public function locationBookingProfiles(?array $value): self
    {
        $this->instance->setLocationBookingProfiles($value);
        return $this;
    }

    /**
     * Sets cursor field.
     */
    public function cursor(?string $value): self
    {
        $this->instance->setCursor($value);
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
     * Initializes a new list location booking profiles response object.
     */
    public function build(): ListLocationBookingProfilesResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
