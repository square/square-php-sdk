<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\Subscription;
use Square\Models\UpdateSubscriptionRequest;

/**
 * Builder for model UpdateSubscriptionRequest
 *
 * @see UpdateSubscriptionRequest
 */
class UpdateSubscriptionRequestBuilder
{
    /**
     * @var UpdateSubscriptionRequest
     */
    private $instance;

    private function __construct(UpdateSubscriptionRequest $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Update Subscription Request Builder object.
     */
    public static function init(): self
    {
        return new self(new UpdateSubscriptionRequest());
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
     * Initializes a new Update Subscription Request object.
     */
    public function build(): UpdateSubscriptionRequest
    {
        return CoreHelper::clone($this->instance);
    }
}
