<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\Error;
use Square\Legacy\Models\Subscription;
use Square\Legacy\Models\UpdateSubscriptionResponse;

/**
 * Builder for model UpdateSubscriptionResponse
 *
 * @see UpdateSubscriptionResponse
 */
class UpdateSubscriptionResponseBuilder
{
    /**
     * @var UpdateSubscriptionResponse
     */
    private $instance;

    private function __construct(UpdateSubscriptionResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Update Subscription Response Builder object.
     */
    public static function init(): self
    {
        return new self(new UpdateSubscriptionResponse());
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
     * Sets subscription field.
     *
     * @param Subscription|null $value
     */
    public function subscription(?Subscription $value): self
    {
        $this->instance->setSubscription($value);
        return $this;
    }

    /**
     * Initializes a new Update Subscription Response object.
     */
    public function build(): UpdateSubscriptionResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
