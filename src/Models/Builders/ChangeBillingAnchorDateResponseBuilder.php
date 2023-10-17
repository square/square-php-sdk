<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\ChangeBillingAnchorDateResponse;
use Square\Models\Subscription;

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
     * Initializes a new change billing anchor date response Builder object.
     */
    public static function init(): self
    {
        return new self(new ChangeBillingAnchorDateResponse());
    }

    /**
     * Sets errors field.
     */
    public function errors(?array $value): self
    {
        $this->instance->setErrors($value);
        return $this;
    }

    /**
     * Sets subscription field.
     */
    public function subscription(?Subscription $value): self
    {
        $this->instance->setSubscription($value);
        return $this;
    }

    /**
     * Sets actions field.
     */
    public function actions(?array $value): self
    {
        $this->instance->setActions($value);
        return $this;
    }

    /**
     * Initializes a new change billing anchor date response object.
     */
    public function build(): ChangeBillingAnchorDateResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
