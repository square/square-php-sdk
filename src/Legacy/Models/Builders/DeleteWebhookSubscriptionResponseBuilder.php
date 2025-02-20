<?php

declare(strict_types=1);

namespace Square\Legacy\Models\Builders;

use Core\Utils\CoreHelper;
use Square\Legacy\Models\DeleteWebhookSubscriptionResponse;
use Square\Legacy\Models\Error;

/**
 * Builder for model DeleteWebhookSubscriptionResponse
 *
 * @see DeleteWebhookSubscriptionResponse
 */
class DeleteWebhookSubscriptionResponseBuilder
{
    /**
     * @var DeleteWebhookSubscriptionResponse
     */
    private $instance;

    private function __construct(DeleteWebhookSubscriptionResponse $instance)
    {
        $this->instance = $instance;
    }

    /**
     * Initializes a new Delete Webhook Subscription Response Builder object.
     */
    public static function init(): self
    {
        return new self(new DeleteWebhookSubscriptionResponse());
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
     * Initializes a new Delete Webhook Subscription Response object.
     */
    public function build(): DeleteWebhookSubscriptionResponse
    {
        return CoreHelper::clone($this->instance);
    }
}
