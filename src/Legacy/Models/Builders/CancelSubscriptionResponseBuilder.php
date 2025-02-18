<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\CancelSubscriptionResponse;
use Square\Legacy\Models\Error;
use Square\Legacy\Models\Subscription;
use Square\Legacy\Models\SubscriptionAction;

/**
 * Builder for model CancelSubscriptionResponse
 *
 * @see CancelSubscriptionResponse
 */
class CancelSubscriptionResponseBuilder
{
    /**
     * @var CancelSubscriptionResponse
     */
    private $instance;

    private function __construct(CancelSubscriptionResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Cancel Subscription Response Builder object.
     */
    public static function init(): self
    {
        return new self(new CancelSubscriptionResponse());
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
     * Sets actions field.
     *
     * @param SubscriptionAction[]|null $value
     */
    public function actions(?array $value): self
    {
        $this->instance->setActions($value);
        return $this;
    }

    /**
     * Initializes a new Cancel Subscription Response object.
     */
    public function build(): CancelSubscriptionResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
