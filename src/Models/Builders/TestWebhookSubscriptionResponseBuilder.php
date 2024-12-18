<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\Error;
use Square\Models\SubscriptionTestResult;
use Square\Models\TestWebhookSubscriptionResponse;

/**
 * Builder for model TestWebhookSubscriptionResponse
 *
 * @see TestWebhookSubscriptionResponse
 */
class TestWebhookSubscriptionResponseBuilder
{
    /**
     * @var TestWebhookSubscriptionResponse
     */
    private $instance;

    private function __construct(TestWebhookSubscriptionResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Test Webhook Subscription Response Builder object.
     */
    public static function init(): self
    {
        return new self(new TestWebhookSubscriptionResponse());
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
     * Sets subscription test result field.
     *
     * @param SubscriptionTestResult|null $value
     */
    public function subscriptionTestResult(?SubscriptionTestResult $value): self
    {
        $this->instance->setSubscriptionTestResult($value);
        return $this;
    }

    /**
     * Initializes a new Test Webhook Subscription Response object.
     */
    public function build(): TestWebhookSubscriptionResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
