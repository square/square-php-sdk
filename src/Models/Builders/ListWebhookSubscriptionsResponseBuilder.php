<?php

declare(strict_types=1);

namespace Square\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Models\Error;
use Square\Models\ListWebhookSubscriptionsResponse;
use Square\Models\WebhookSubscription;

/**
 * Builder for model ListWebhookSubscriptionsResponse
 *
 * @see ListWebhookSubscriptionsResponse
 */
class ListWebhookSubscriptionsResponseBuilder
{
    /**
     * @var ListWebhookSubscriptionsResponse
     */
    private $instance;

    private function __construct(ListWebhookSubscriptionsResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new List Webhook Subscriptions Response Builder object.
     */
    public static function init(): self
    {
        return new self(new ListWebhookSubscriptionsResponse());
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
     * Sets subscriptions field.
     *
     * @param WebhookSubscription[]|null $value
     */
    public function subscriptions(?array $value): self
    {
        $this->instance->setSubscriptions($value);
        return $this;
    }

    /**
     * Sets cursor field.
     *
     * @param string|null $value
     */
    public function cursor(?string $value): self
    {
        $this->instance->setCursor($value);
        return $this;
    }

    /**
     * Initializes a new List Webhook Subscriptions Response object.
     */
    public function build(): ListWebhookSubscriptionsResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
