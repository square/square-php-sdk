<?php

namespace Square\Webhooks\Subscriptions\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class TestWebhookSubscriptionRequest extends JsonSerializableType
{
    /**
     * @var string $subscriptionId [REQUIRED] The ID of the [Subscription](entity:WebhookSubscription) to test.
     */
    private string $subscriptionId;

    /**
     * The event type that will be used to test the [Subscription](entity:WebhookSubscription). The event type must be
     * contained in the list of event types in the [Subscription](entity:WebhookSubscription).
     *
     * @var ?string $eventType
     */
    #[JsonProperty('event_type')]
    private ?string $eventType;

    /**
     * @param array{
     *   subscriptionId: string,
     *   eventType?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->subscriptionId = $values['subscriptionId'];
        $this->eventType = $values['eventType'] ?? null;
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
     * @return ?string
     */
    public function getEventType(): ?string
    {
        return $this->eventType;
    }

    /**
     * @param ?string $value
     */
    public function setEventType(?string $value = null): self
    {
        $this->eventType = $value;
        return $this;
    }
}
