<?php

namespace Square\Webhooks\Subscriptions\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;
use Square\Types\WebhookSubscription;

class CreateWebhookSubscriptionRequest extends JsonSerializableType
{
    /**
     * @var ?string $idempotencyKey A unique string that identifies the [CreateWebhookSubscription](api-endpoint:WebhookSubscriptions-CreateWebhookSubscription) request.
     */
    #[JsonProperty('idempotency_key')]
    private ?string $idempotencyKey;

    /**
     * @var WebhookSubscription $subscription The [Subscription](entity:WebhookSubscription) to create.
     */
    #[JsonProperty('subscription')]
    private WebhookSubscription $subscription;

    /**
     * @param array{
     *   subscription: WebhookSubscription,
     *   idempotencyKey?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->idempotencyKey = $values['idempotencyKey'] ?? null;
        $this->subscription = $values['subscription'];
    }

    /**
     * @return ?string
     */
    public function getIdempotencyKey(): ?string
    {
        return $this->idempotencyKey;
    }

    /**
     * @param ?string $value
     */
    public function setIdempotencyKey(?string $value = null): self
    {
        $this->idempotencyKey = $value;
        return $this;
    }

    /**
     * @return WebhookSubscription
     */
    public function getSubscription(): WebhookSubscription
    {
        return $this->subscription;
    }

    /**
     * @param WebhookSubscription $value
     */
    public function setSubscription(WebhookSubscription $value): self
    {
        $this->subscription = $value;
        return $this;
    }
}
