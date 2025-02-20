<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\CreateWebhookSubscriptionRequest;
use Square\Legacy\Models\WebhookSubscription;

/**
 * Builder for model CreateWebhookSubscriptionRequest
 *
 * @see CreateWebhookSubscriptionRequest
 */
class CreateWebhookSubscriptionRequestBuilder
{
    /**
     * @var CreateWebhookSubscriptionRequest
     */
    private $instance;

    private function __construct(CreateWebhookSubscriptionRequest $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Create Webhook Subscription Request Builder object.
     *
     * @param WebhookSubscription $subscription
     */
    public static function init(WebhookSubscription $subscription): self
    {
        return new self(new CreateWebhookSubscriptionRequest($subscription));
    }

    /**
     * Sets idempotency key field.
     *
     * @param string|null $value
     */
    public function idempotencyKey(?string $value): self
    {
        $this->instance->setIdempotencyKey($value);
        return $this;
    }

    /**
     * Initializes a new Create Webhook Subscription Request object.
     */
    public function build(): CreateWebhookSubscriptionRequest
    {
        return CoreHelper::clone($this->instance);
    }
}
