<?php

namespace Square\Webhooks\Subscriptions\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Types\WebhookSubscription;
use Square\Core\Json\JsonProperty;

class UpdateWebhookSubscriptionRequest extends JsonSerializableType
{
    /**
     * @var string $subscriptionId [REQUIRED] The ID of the [Subscription](entity:WebhookSubscription) to update.
     */
    private string $subscriptionId;

    /**
     * @var ?WebhookSubscription $subscription The [Subscription](entity:WebhookSubscription) to update.
     */
    #[JsonProperty('subscription')]
    private ?WebhookSubscription $subscription;

    /**
     * @param array{
     *   subscriptionId: string,
     *   subscription?: ?WebhookSubscription,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->subscriptionId = $values['subscriptionId'];
        $this->subscription = $values['subscription'] ?? null;
    }

    /**
     * @return string
     */
    public function getSubscriptionId(): string
    {
        return $this->subscriptionId;
    }

    /**
     * @param string $value
     */
    public function setSubscriptionId(string $value): self
    {
        $this->subscriptionId = $value;
        return $this;
    }

    /**
     * @return ?WebhookSubscription
     */
    public function getSubscription(): ?WebhookSubscription
    {
        return $this->subscription;
    }

    /**
     * @param ?WebhookSubscription $value
     */
    public function setSubscription(?WebhookSubscription $value = null): self
    {
        $this->subscription = $value;
        return $this;
    }
}
