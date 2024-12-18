<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\Error;
use Square\Models\RetrieveWebhookSubscriptionResponse;
use Square\Models\WebhookSubscription;

/**
 * Builder for model RetrieveWebhookSubscriptionResponse
 *
 * @see RetrieveWebhookSubscriptionResponse
 */
class RetrieveWebhookSubscriptionResponseBuilder
{
    /**
     * @var RetrieveWebhookSubscriptionResponse
     */
    private $instance;

    private function __construct(RetrieveWebhookSubscriptionResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Retrieve Webhook Subscription Response Builder object.
     */
    public static function init(): self
    {
        return new self(new RetrieveWebhookSubscriptionResponse());
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
     * @param WebhookSubscription|null $value
     */
    public function subscription(?WebhookSubscription $value): self
    {
        $this->instance->setSubscription($value);
        return $this;
    }

    /**
     * Initializes a new Retrieve Webhook Subscription Response object.
     */
    public function build(): RetrieveWebhookSubscriptionResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
