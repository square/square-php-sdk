<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\CreateSubscriptionResponse;
use Square\Legacy\Models\Error;
use Square\Legacy\Models\Subscription;

/**
 * Builder for model CreateSubscriptionResponse
 *
 * @see CreateSubscriptionResponse
 */
class CreateSubscriptionResponseBuilder
{
    /**
     * @var CreateSubscriptionResponse
     */
    private $instance;

    private function __construct(CreateSubscriptionResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Create Subscription Response Builder object.
     */
    public static function init(): self
    {
        return new self(new CreateSubscriptionResponse());
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
     * Initializes a new Create Subscription Response object.
     */
    public function build(): CreateSubscriptionResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
