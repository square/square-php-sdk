<?php

namespace Square\Webhooks\Subscriptions\Requests;

use Square\Core\Json\JsonSerializableType;

class GetSubscriptionsRequest extends JsonSerializableType
{
    /**
     * @var string $subscriptionId [REQUIRED] The ID of the [Subscription](entity:WebhookSubscription) to retrieve.
     */
    private string $subscriptionId;

    /**
     * @param array{
     *   subscriptionId: string,
     * } $values
     */
    public function __construct(
        array $values,
    ) {
        $this->subscriptionId = $values['subscriptionId'];
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
}
