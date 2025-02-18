<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\ChangeBillingAnchorDateResponse;
use Square\Legacy\Models\Error;
use Square\Legacy\Models\Subscription;
use Square\Legacy\Models\SubscriptionAction;

/**
 * Builder for model ChangeBillingAnchorDateResponse
 *
 * @see ChangeBillingAnchorDateResponse
 */
class ChangeBillingAnchorDateResponseBuilder
{
    /**
     * @var ChangeBillingAnchorDateResponse
     */
    private $instance;

    private function __construct(ChangeBillingAnchorDateResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Change Billing Anchor Date Response Builder object.
     */
    public static function init(): self
    {
        return new self(new ChangeBillingAnchorDateResponse());
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
     * Initializes a new Change Billing Anchor Date Response object.
     */
    public function build(): ChangeBillingAnchorDateResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
