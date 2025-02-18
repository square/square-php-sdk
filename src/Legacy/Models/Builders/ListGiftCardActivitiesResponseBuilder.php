<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\Error;
use Square\Legacy\Models\GiftCardActivity;
use Square\Legacy\Models\ListGiftCardActivitiesResponse;

/**
 * Builder for model ListGiftCardActivitiesResponse
 *
 * @see ListGiftCardActivitiesResponse
 */
class ListGiftCardActivitiesResponseBuilder
{
    /**
     * @var ListGiftCardActivitiesResponse
     */
    private $instance;

    private function __construct(ListGiftCardActivitiesResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new List Gift Card Activities Response Builder object.
     */
    public static function init(): self
    {
        return new self(new ListGiftCardActivitiesResponse());
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
     * Sets gift card activities field.
     *
     * @param GiftCardActivity[]|null $value
     */
    public function giftCardActivities(?array $value): self
    {
        $this->instance->setGiftCardActivities($value);
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
     * Initializes a new List Gift Card Activities Response object.
     */
    public function build(): ListGiftCardActivitiesResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
