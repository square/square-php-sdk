<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\Error;
use Square\Legacy\Models\ResumeSubscriptionResponse;
use Square\Legacy\Models\Subscription;
use Square\Legacy\Models\SubscriptionAction;

/**
 * Builder for model ResumeSubscriptionResponse
 *
 * @see ResumeSubscriptionResponse
 */
class ResumeSubscriptionResponseBuilder
{
    /**
     * @var ResumeSubscriptionResponse
     */
    private $instance;

    private function __construct(ResumeSubscriptionResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Resume Subscription Response Builder object.
     */
    public static function init(): self
    {
        return new self(new ResumeSubscriptionResponse());
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
     * Initializes a new Resume Subscription Response object.
     */
    public function build(): ResumeSubscriptionResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
