<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\Error;
use Square\Models\UpdateWebhookSubscriptionResponse;
use Square\Models\WebhookSubscription;

/**
 * Builder for model UpdateWebhookSubscriptionResponse
 *
 * @see UpdateWebhookSubscriptionResponse
 */
class UpdateWebhookSubscriptionResponseBuilder
{
    /**
     * @var UpdateWebhookSubscriptionResponse
     */
    private $instance;

    private function __construct(UpdateWebhookSubscriptionResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Update Webhook Subscription Response Builder object.
     */
    public static function init(): self
    {
        return new self(new UpdateWebhookSubscriptionResponse());
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
     * Initializes a new Update Webhook Subscription Response object.
     */
    public function build(): UpdateWebhookSubscriptionResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
