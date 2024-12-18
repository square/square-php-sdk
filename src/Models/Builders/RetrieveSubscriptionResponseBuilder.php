<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\Error;
use Square\Models\RetrieveSubscriptionResponse;
use Square\Models\Subscription;

/**
 * Builder for model RetrieveSubscriptionResponse
 *
 * @see RetrieveSubscriptionResponse
 */
class RetrieveSubscriptionResponseBuilder
{
    /**
     * @var RetrieveSubscriptionResponse
     */
    private $instance;

    private function __construct(RetrieveSubscriptionResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Retrieve Subscription Response Builder object.
     */
    public static function init(): self
    {
        return new self(new RetrieveSubscriptionResponse());
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
     * Initializes a new Retrieve Subscription Response object.
     */
    public function build(): RetrieveSubscriptionResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
