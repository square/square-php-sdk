<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\Error;
use Square\Legacy\Models\LoyaltyEvent;
use Square\Legacy\Models\SearchLoyaltyEventsResponse;

/**
 * Builder for model SearchLoyaltyEventsResponse
 *
 * @see SearchLoyaltyEventsResponse
 */
class SearchLoyaltyEventsResponseBuilder
{
    /**
     * @var SearchLoyaltyEventsResponse
     */
    private $instance;

    private function __construct(SearchLoyaltyEventsResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Search Loyalty Events Response Builder object.
     */
    public static function init(): self
    {
        return new self(new SearchLoyaltyEventsResponse());
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
     * Sets events field.
     *
     * @param LoyaltyEvent[]|null $value
     */
    public function events(?array $value): self
    {
        $this->instance->setEvents($value);
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
     * Initializes a new Search Loyalty Events Response object.
     */
    public function build(): SearchLoyaltyEventsResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
