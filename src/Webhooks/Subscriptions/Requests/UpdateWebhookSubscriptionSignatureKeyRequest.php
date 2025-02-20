<?php

namespace Square\Webhooks\Subscriptions\Requests;

use Square\Core\Json\JsonSerializableType;
use Square\Core\Json\JsonProperty;

class UpdateWebhookSubscriptionSignatureKeyRequest extends JsonSerializableType
{
    /**
     * @var string $subscriptionId [REQUIRED] The ID of the [Subscription](entity:WebhookSubscription) to update.
     */
    private string $subscriptionId;

    /**
     * @var ?string $idempotencyKey A unique string that identifies the [UpdateWebhookSubscriptionSignatureKey](api-endpoint:WebhookSubscriptions-UpdateWebhookSubscriptionSignatureKey) request.
     */
    #[JsonProperty('idempotency_key')]
    private ?string $idempotencyKey;

    /**
     * @param array{
     *   subscriptionId: string,
     *   idempotencyKey?: ?string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->subscriptionId = $values['subscriptionId'];
        $this->idempotencyKey = $values['idempotencyKey'] ?? null;
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
}
