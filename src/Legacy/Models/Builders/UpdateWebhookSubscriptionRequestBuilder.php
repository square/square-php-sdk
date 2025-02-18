<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\UpdateWebhookSubscriptionRequest;
use Square\Legacy\Models\WebhookSubscription;

/**
 * Builder for model UpdateWebhookSubscriptionRequest
 *
 * @see UpdateWebhookSubscriptionRequest
 */
class UpdateWebhookSubscriptionRequestBuilder
{
    /**
     * @var UpdateWebhookSubscriptionRequest
     */
    private $instance;

    private function __construct(UpdateWebhookSubscriptionRequest $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Update Webhook Subscription Request Builder object.
     */
    public static function init(): self
    {
        return new self(new UpdateWebhookSubscriptionRequest());
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
     * Initializes a new Update Webhook Subscription Request object.
     */
    public function build(): UpdateWebhookSubscriptionRequest
    {
        return CoreHelper::clone($this->instance);
    }
}
