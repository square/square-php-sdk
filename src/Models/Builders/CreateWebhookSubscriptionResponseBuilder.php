<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\CreateWebhookSubscriptionResponse;
use Square\Models\Error;
use Square\Models\WebhookSubscription;

/**
 * Builder for model CreateWebhookSubscriptionResponse
 *
 * @see CreateWebhookSubscriptionResponse
 */
class CreateWebhookSubscriptionResponseBuilder
{
    /**
     * @var CreateWebhookSubscriptionResponse
     */
    private $instance;

    private function __construct(CreateWebhookSubscriptionResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Create Webhook Subscription Response Builder object.
     */
    public static function init(): self
    {
        return new self(new CreateWebhookSubscriptionResponse());
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
     * Initializes a new Create Webhook Subscription Response object.
     */
    public function build(): CreateWebhookSubscriptionResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
