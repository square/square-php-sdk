<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\Error;
use Square\Legacy\Models\RetrieveWebhookSubscriptionResponse;
use Square\Legacy\Models\WebhookSubscription;

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
