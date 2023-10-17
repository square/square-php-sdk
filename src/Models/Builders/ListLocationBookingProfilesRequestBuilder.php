<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\ListLocationBookingProfilesRequest;

/**
 * Builder for model ListLocationBookingProfilesRequest
 *
 * @see ListLocationBookingProfilesRequest
 */
class ListLocationBookingProfilesRequestBuilder
{
    /**
     * @var ListLocationBookingProfilesRequest
     */
    private $instance;

    private function __construct(ListLocationBookingProfilesRequest $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new list location booking profiles request Builder object.
     */
    public static function init(): self
    {
        return new self(new ListLocationBookingProfilesRequest());
    }

    /**
     * Sets limit field.
     */
    public function limit(?int $value): self
    {
        $this->instance->setLimit($value);
        return $this;
    }

    /**
     * Unsets limit field.
     */
    public function unsetLimit(): self
    {
        $this->instance->unsetLimit();
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
     * Unsets cursor field.
     */
    public function unsetCursor(): self
    {
        $this->instance->unsetCursor();
        return $this;
    }

    /**
     * Initializes a new list location booking profiles request object.
     */
    public function build(): ListLocationBookingProfilesRequest
    {
        return CoreHelper::clone($this->instance);
    }
}
